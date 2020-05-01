<?php

declare(strict_types=1);

namespace Croct\CodingStandard\CodeSniffer\Croct\Sniffs\Methods;

use PHP_CodeSniffer\Exceptions\RuntimeException;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Standards\PSR1\Sniffs\Methods\CamelCapsMethodNameSniff as Psr1CamelCapsMethodNameSniff;

class CamelCapsMethodNameSniff extends Psr1CamelCapsMethodNameSniff
{
    /**
     * @param File $phpcsFile The file being processed.
     * @param int  $stackPtr  The position where this token was found.
     * @param int  $currScope The position of the current scope.
     *
     * @throws RuntimeException
     */
    protected function processTokenWithinScope(File $phpcsFile, $stackPtr, $currScope) : void
    {
        $tokens = $phpcsFile->getTokens();

        // Determine if this is a function which needs to be examined.
        $conditions = $tokens[$stackPtr]['conditions'];

        \end($conditions);
        $deepestScope = \key($conditions);

        if ($deepestScope !== $currScope) {
            return;
        }

        $methodName = $phpcsFile->getDeclarationName($stackPtr);

        if ($methodName === null || \preg_match('/^[A-Z][A-Z0-9]+(_[A-Z0-9]+)*$/', $methodName) !== 0) {
            // Ignore constant-like methods
            return;
        }

        parent::processTokenWithinScope($phpcsFile, $stackPtr, $currScope);
    }
}
