<?php

namespace Eightfold\Foldable\Tests;

use Eightfold\Foldable\Tests\TestCase;

use Eightfold\Foldable\Tests\ExtensionMocks\Apply;
use Eightfold\Foldable\Tests\ExtensionMocks\PipeFilters\ReverseBool;
use Eightfold\Foldable\Tests\ExtensionMocks\PipeFilters\BoolToString;
use Eightfold\Foldable\Tests\ExtensionMocks\PipeFilters\StringToArray;
use Eightfold\Foldable\Tests\ExtensionMocks\PipeFilters\ArrayToString;

use Eightfold\Foldable\Pipe;

class PipingTest extends TestCase
{
    public function test_applying_filters_using_factory()
    {
        $this->start = hrtime(true);
        $expected = "f!a!l!s!e";
        $actual = Pipe::fold(true,
            Apply::reverseBool(),
            Apply::boolToString(),
            Apply::stringToArray(),
            Apply::arrayToString("!")
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 1.4);
    }

    public function test_apply_namespace_has_correct_root_for_filters()
    {
        $expected = "Eightfold\\Foldable\\Tests\\ExtensionMocks\\PipeFilters";
        $actual = Apply::rootNameSpaceForFilters();
        $this->assertEqualsWithPerformance($expected, $actual, 0.2);
    }

    public function test_piping_without_using_apply_factory()
    {
        $this->start = hrtime(true);
        $expected = "f!a!l!s!e";
        $actual = Pipe::fold(true,
            ReverseBool::apply(),
            BoolToString::apply(),
            StringToArray::apply(),
            ArrayToString::applyWith("!")
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function test_filter_is_self_reliant()
    {
        $payload = ["8", "f", "o", "l", "d"];
        $expected = "8fold";
        $actual = ArrayToString::apply()->unfoldUsing($payload);
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function test_filter_args_can_include_booleans()
    {
        $expected = [false];
        $actual = BoolToString::applyWith(false)->args(true);
        $this->assertEqualsWithPerformance($expected, $actual);
    }
}
