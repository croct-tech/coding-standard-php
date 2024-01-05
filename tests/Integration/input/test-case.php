<?php

declare(strict_types=1);

namespace Fancy;

use PHPUnit\Framework\Attributes\BeforeClass;
use PHPUnit\Framework\Attributes\AfterClass;
use PHPUnit\Framework\Attributes\Before;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @package Quite useless
 *
 * @requires PHP 7.2
 */
final class TestCase extends BaseTestCase
{
    #[BeforeClass]
    #[AfterClass]
    static public function doStuff(): void
    {
    }

    #[Before]

    public function createDependencies()
    {
    }

    #[Before, AfterClass]
    #[UsesClass(MyClass::__construct), UsesClass(MyClass::someMethod)]
    #[TestDox('The method should do stuff')]
    /**
     * @see SomeClass
     */
    public function methodShouldDoStuff()
    {
    }
}
