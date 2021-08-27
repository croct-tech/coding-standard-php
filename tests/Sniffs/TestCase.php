<?php

declare(strict_types=1);

namespace Croct\Tests\Sniffs;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Runner;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHPUnit\Framework\ExpectationFailedException;
use ReflectionClass;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string        $filePath
     * @param array<mixed>  $sniffProperties
     * @param array<string> $codesToCheck
     *
     * @throws \Exception
     *
     * @return File
     */
    protected static function checkFile(string $filePath, array $sniffProperties = [], array $codesToCheck = []) : File
    {
        $codeSniffer = new Runner();
        $codeSniffer->config = new Config(['-s']);
        $codeSniffer->init();

        if (\count($sniffProperties) > 0) {
            $codeSniffer->ruleset->ruleset[static::getSniffName()]['properties'] = $sniffProperties;
        }

        /** @var class-string<\PHP_CodeSniffer\Sniffs\Sniff> $sniffClassName */
        $sniffClassName = static::getSniffClassName();

        $codeSniffer->ruleset->sniffs = [$sniffClassName => new $sniffClassName()];

        if (\count($codesToCheck) > 0) {
            foreach (static::getSniffClassReflection()->getConstants() as $constantName => $constantValue) {
                if (\strpos($constantName, 'CODE_') !== 0 || \in_array($constantValue, $codesToCheck, true)) {
                    continue;
                }

                $key = \sprintf('%s.%s', static::getSniffName(), $constantValue);

                $codeSniffer->ruleset->ruleset[$key]['severity'] = 0;
            }
        }

        $codeSniffer->ruleset->populateTokenListeners();

        $file = new LocalFile($filePath, $codeSniffer->ruleset, $codeSniffer->config);
        $file->process();

        return $file;
    }

    /**
     * @throws ExpectationFailedException
     */
    protected static function assertNoSniffErrorInFile(File $phpcsFile) : void
    {
        $errors = $phpcsFile->getErrors();

        self::assertEmpty($errors, \sprintf('No errors expected, but %d errors found.', \count($errors)));
    }

    /**
     * @throws ExpectationFailedException
     */
    protected static function assertSniffError(File $phpcsFile, int $line, string $code, ?string $message = null) : void
    {
        $errors = $phpcsFile->getErrors();

        self::assertTrue(isset($errors[$line]), \sprintf('Expected error on line %s, but none found.', $line));

        $sniffCode = \sprintf('%s.%s', static::getSniffName(), $code);

        self::assertTrue(
            self::hasError($errors[$line], $sniffCode, $message),
            \sprintf(
                'Expected error %s%s, but none found on line %d.%sErrors found on line %d:%s%s%s',
                $sniffCode,
                $message !== null ? \sprintf(' with message "%s"', $message) : '',
                $line,
                \PHP_EOL . \PHP_EOL,
                $line,
                \PHP_EOL,
                self::getFormattedErrors($errors[$line]),
                \PHP_EOL
            )
        );
    }

    /**
     * @throws ExpectationFailedException
     */
    protected static function assertNoSniffError(File $phpcsFile, int $line) : void
    {
        $errors = $phpcsFile->getErrors();
        self::assertFalse(
            isset($errors[$line]),
            \sprintf(
                'Expected no error on line %s, but found:%s%s%s',
                $line,
                \PHP_EOL . \PHP_EOL,
                isset($errors[$line]) ? self::getFormattedErrors($errors[$line]) : '',
                \PHP_EOL
            )
        );
    }

    /**
     * @throws ExpectationFailedException
     */
    protected static function assertAllFixedInFile(File $phpcsFile) : void
    {
        $phpcsFile->disableCaching();
        $phpcsFile->fixer->fixFile();

        /** @var string $expected */
        $expected = \preg_replace('~(\\.php)$~', '.fixed\\1', $phpcsFile->getFilename());

        self::assertStringEqualsFile($expected, $phpcsFile->fixer->getContents());
    }

    protected static function getSniffName() : string
    {
        return (string) \preg_replace(
            [
                '~\\\~',
                '~\.CodingStandard~',
                '~\.Sniffs~',
                '~Sniff$~',
            ],
            [
                '.',
                '',
                '',
                '',
            ],
            static::getSniffClassName()
        );
    }

    protected static function getSniffClassName() : string
    {
        return \str_replace('\Tests', '', \substr(static::class, 0, -\strlen('Test')));
    }

    /**
     * @return ReflectionClass<Sniff>
     *
     * @throws \ReflectionException
     */
    protected static function getSniffClassReflection() : ReflectionClass
    {
        static $reflections = [];

        /** @phpstan-var class-string $className */
        $className = static::getSniffClassName();

        return $reflections[$className] ?? $reflections[$className] = new ReflectionClass($className);
    }

    /**
     * @param array<array<array<string|int>>> $errorsOnLine
     * @param string                          $sniffCode
     * @param string|null                     $message
     *
     * @return bool
     */
    private static function hasError(array $errorsOnLine, string $sniffCode, ?string $message) : bool
    {
        $hasError = false;

        foreach ($errorsOnLine as $errorsOnPosition) {
            foreach ($errorsOnPosition as $error) {
                /** @var string $errorSource */
                $errorSource = $error['source'];
                /** @var string $errorMessage */
                $errorMessage = $error['message'];

                if ($errorSource === $sniffCode && ($message === null || \strpos($errorMessage, $message) !== false)) {
                    $hasError = true;
                    break;
                }
            }
        }

        return $hasError;
    }

    /**
     * @param array<array<array<string|int|bool>>> $errors
     */
    private static function getFormattedErrors(array $errors) : string
    {
        return \implode(
            \PHP_EOL,
            \array_map(
                static function (array $errors) : string {
                    return \implode(
                        \PHP_EOL,
                        \array_map(
                            static function (array $error) : string {
                                return \sprintf("\t%s: %s", $error['source'], $error['message']);
                            },
                            $errors
                        )
                    );
                },
                $errors
            )
        );
    }

}
