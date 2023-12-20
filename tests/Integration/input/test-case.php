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

    
    #[UsesClass(MyClass::__construct)]
    #[TestDox('The method should do stuff')]
    #[Test]
    public function methodShouldDoStuff()
    {
    }
}
