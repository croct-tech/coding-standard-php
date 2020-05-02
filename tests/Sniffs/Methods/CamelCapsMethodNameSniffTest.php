<?php

declare(strict_types=1);

namespace Croct\Tests\Sniffs\Methods;

use Croct\Tests\Sniffs\TestCase;

final class CamelCapsMethodNameSniffTest extends TestCase
{
    public function testNoErrors() : void
    {
        $report = self::checkFile(__DIR__ . '/../../fixtures/allowConstantLikeMethods.php');

        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors() : void
    {
        $report = self::checkFile(__DIR__ . '/../../fixtures/enforceCamelCapsMethodName.php');

        self::assertSame(1, $report->getErrorCount());

        self::assertSniffError(
            $report,
            5,
            'NotCamelCaps',
            'Method name "Example::foo_BAR_foo" is not in camel caps format'
        );
    }
}
