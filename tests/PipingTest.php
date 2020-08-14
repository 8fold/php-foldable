<?php

namespace Eightfold\Foldable\Tests;

use Eightfold\Foldable\Tests\TestCase;
use Eightfold\Foldable\Tests\Filters\ReverseBool;
use Eightfold\Foldable\Tests\Filters\BoolToString;
use Eightfold\Foldable\Tests\Filters\StringToArray;
use Eightfold\Foldable\Tests\Filters\ArrayToString;

use Eightfold\Foldable\Pipe;

class PipingTest extends TestCase
{
    public function test_piping()
    {
        $expected = "f!a!l!s!e";
        $actual = Pipe::fold(true,
            ReverseBool::apply(),
            BoolToString::apply(),
            StringToArray::apply(),
            ArrayToString::applyWith("!")
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 1.05);

        $expected = true;
        $actual = Pipe::fold(true,
            ReverseBool::apply(),
            ReverseBool::apply()
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 1.2);

        $this->start = hrtime(true);
        $expected = false;
        $actual = Pipe::fold(true, ReverseBool::apply())->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);

        $this->start = hrtime(true);
        $expected = true;
        $actual = Pipe::fold(true)->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);

        $expected = [];
        $actual = Pipe::fold()->args();
        $this->assertEqualsWithPerformance($expected, $actual);

        $expected = [];
        $actual = Pipe::fold()->args(true);
        $this->assertEqualsWithPerformance($expected, $actual);

        $expected = [];
        $actual = Pipe::fold(true)->args();
        $this->assertEqualsWithPerformance($expected, $actual);

        $expected = [true];
        $actual = Pipe::fold(true)->args(true);
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function test_filters()
    {
        $payload = ["8", "f", "o", "l", "d"];
        $expected = "8fold";
        $actual = ArrayToString::apply()->unfoldUsing($payload);
        $this->assertEqualsWithPerformance($expected, $actual);
    }
}
