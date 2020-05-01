<?php

declare(strict_types=1);

namespace Fancy;

use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @package Quite useless
 *
 * @requires PHP 7.2
 */
final class TestCase extends BaseTestCase
{
    /**
     * @beforeClass
     * @afterClass
     */
    static public function doStuff(): void
    {
    }

    /**
     * @before
     */
    public function createDependencies()
    {
    }

    /**
     * @test
     *
     * @uses MyClass::__construct
     *
     * @covers MyClass::test
     *
     * @testdox The method should do stuff
     */
    public function methodShouldDoStuff()
    {
    }
}
