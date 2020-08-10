<?php

namespace Eightfold\Foldable\Tests;

use Eightfold\Foldable\Tests\TestCase;

use Eightfold\Foldable\Fold;

use Eightfold\Foldable\Tests\TestClasses\TestInterfaceOnly;
use Eightfold\Foldable\Tests\TestClasses\TestTraitOnly;

class FoldUnfoldTest extends TestCase
{
    public function test_nested_unfolding()
    {
        $expected = "Hello!";
        $actual = Fold::fold(
            Fold::fold(
                Fold::string("Hello!")
            )
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function test_fold_unfold_speed_for_class()
    {
        $expected = "";
        $actual = Fold::fold("")->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);

        $this->start = hrtime(true);
        $expected = "string";
        $actual = Fold::fold("string")->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function test_fold_unfold_speed_for_trait()
    {
        $expected = "";
        $actual = TestTraitOnly::fold("")->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 0.3);

        $this->start = hrtime(true);
        $expected = "string";
        $actual = TestTraitOnly::fold("string")->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    public function test_fold_unfold_speed_for_interface()
    {
        $expected = "";
        $actual = TestInterfaceOnly::fold("")->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);

        $this->start = hrtime(true);
        $expected = "string";
        $actual = TestInterfaceOnly::fold("string")->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);
    }
}
