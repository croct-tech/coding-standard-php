<?php

declare(strict_types=1);

namespace Blah;

class Test
{
    public function a():void
    {
    }

    public function b(): void
    {
    }

    public function c():     void
    {
    }

    public function d() :void
    {
    }

    public function e()     :void
    {
    }

    public function f(
        int $a,
        int $b,
        int $c,
        int $d,
        int $e,
        int $f,
        int $g,
    ):void {
    }

    public function g(
        int $a,
        int $b,
        int $c,
        int $d,
        int $e,
        int $f,
        int $g,
    ) :void {
    }

    public function h(
        int $a,
        int $b,
        int $c,
        int $d,
        int $e,
        int $f,
        int $g,
    )     :void {
    }

    public function i(
        int $a,
        int $b,
        int $c,
        int $d,
        int $e,
        int $f,
        int $g,
    ): void {
    }

    public function j(
        int $a,
        int $b,
        int $c,
        int $d,
        int $e,
        int $f,
        int $g,
    ):     void {
    }
}
