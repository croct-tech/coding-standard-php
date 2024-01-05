<?php

declare(strict_types=1);

namespace Fancy;

use PHPUnit\Framework\Attributes\AfterClass;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\BeforeClass;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @requires PHP 7.2
 */
final class TestCase extends BaseTestCase
{
    #[AfterClass]
    #[BeforeClass]
    public static function doStuff(): void
    {
    }

    #[Before]
    public function createDependencies(): void
    {
    }

    /**
     * @see SomeClass
     */
    #[AfterClass]
    #[Before]
    #[TestDox('The method should do stuff')]
    #[UsesClass(MyClass::__construct)]
    #[UsesClass(MyClass::someMethod)]
    public function methodShouldDoStuff(): void
    {
    }
}
