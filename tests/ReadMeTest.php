<?php

namespace Eightfold\Foldable\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Foldable\Tests\Extensions\MyFoldable;
use Eightfold\Foldable\Tests\Extensions\Append;
use Eightfold\Foldable\Tests\Extensions\Prepend;

use Eightfold\Foldable\Fold;

use Eightfold\Foldable\Apply;
use Eightfold\Foldable\Filter;

use Eightfold\Foldable\Pipe;

class ReadMeTest extends PHPUnitTestCase
{
    /**
     * @test
     */
    public function example_one()
    {
        AssertEquals::applyWith(
            "Hello, World!",
            "string",
            0.35 // 0.34 // 0.32
        )->unfoldUsing(
            MyFoldable::fold("Hello")->append(", World!")
        );
    }

    /**
     * @test
     */
    public function example_two()
    {
        AssertEquals::applyWith(
            "Hello, World!",
            "string",
            0.19 // 0.17 // 0.16
        )->unfoldUsing(
            Append::applyWith(", World!")->unfoldUsing("Hello")
        );

        AssertEquals::applyWith(
            "Hello, World!",
            "string",
            0.23 // 0.006
        )->unfoldUsing(
            MyFoldable::fold("Hello")->append(", World!")
        );
    }

    /**
     * @test
     */
    public function example_three()
    {
        AssertEquals::applyWith(
            "Hello, World!",
            "string",
            2.47
        )->unfoldUsing(
            Pipe::fold("World",
                Prepend::applyWith("Hello, "),
                Append::applyWith("!")
            )
        );

        AssertEquals::applyWith(
            "Hello, World!",
            "string",
            0.52
        )->unfoldUsing(
            Pipe::fold("World",
                Prepend::applyWith(
                    Pipe::fold("ello",
                        Prepend::applyWith("H", $appendFilter),
                        Append::applyWith(","),
                        Append::applyWith(" ")
                    )
                ),
                Append::applyWith("!")
            )
        );
    }
}
