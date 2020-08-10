<?php

namespace Eightfold\Foldable\Test;

use \InvalidArgumentException;

use Eightfold\Foldable\Tests\TestCase;

use Eightfold\Foldable\Tests\TestClasses\TestExtension;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

class ExtensibilityTest extends TestCase
{
    public function test_nested_unfolding()
    {
        $expected = "string Foldable Foldable string";
        $actual = TestExtension::fold(
            "string ",
            TestExtension::fold(
                TestExtension::string("Foldable ")
            ),
            TestExtension::fold(
                TestExtension::string("Foldable ")
            ),
            "string"
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 0.5);
    }

    public function test_custom_type_safe_fold(): void
    {
        $expected = "hello";
        $actual = TestExtension::fold("hello")->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 0.5);
    }

    public function test_custom_type_safe_construct(): void
    {
        $expected = "hello";
        $actual = new TestExtension("hello");
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function test_instance_is_expected_types(): void
    {
        $actual = new TestExtension("");
        $this->assertTrue(is_a($actual, TestExtension::class));
        $this->assertTrue(is_a($actual, Fold::class));
        $this->assertTrue(is_a($actual, Foldable::class));
    }
}
