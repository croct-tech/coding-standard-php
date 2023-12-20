<?php

declare(strict_types=1);

namespace Fancy;

use PHPUnit\Framework\Attributes\BeforeClass;
use PHPUnit\Framework\Attributes\AfterClass;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @requires PHP 7.2
 */
final class TestCase extends BaseTestCase
{
    #[BeforeClass]
    #[AfterClass]
    public static function doStuff(): void
    {
    }

    #[Before]
    public function createDependencies(): void
    {
    }

    
    #[UsesClass(MyClass::__construct)]
    #[TestDox('The method should do stuff')]
    public function methodShouldDoStuff(): void
    {
    }
}
