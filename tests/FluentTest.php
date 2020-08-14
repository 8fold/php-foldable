<?php

namespace Eightfold\Foldable\Tests;

use Eightfold\Foldable\Tests\TestCase;

use Eightfold\Foldable\Tests\ExtensionMocks\FluentTypes\Foldable;

class FluentTest extends TestCase
{
    /**
     * - `toggle()` mutable.
     * - `fluentToggle()` immutable.
     */
    public function test_chaining()
    {
        $this->start = hrtime(true);
        $expected = true;
        $actual = Foldable::fold(true)->toggle()->toggleFluent()->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);
    }

    /**
     * No mutations of internal data.
     */
    public function test_fold_and_unfold()
    {
        $this->start = hrtime(true);
        $expected = true;
        $actual = Foldable::fold(true)->unfold();
        $this->assertEqualsWithPerformance($expected, $actual);
    }
}
