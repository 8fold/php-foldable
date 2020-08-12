<?php

namespace Eightfold\Foldable\Tests;

use Eightfold\Foldable\Tests\TestCase;

use Eightfold\Foldable\Bend;

class BendTest extends TestCase
{
    public function test_bent()
    {
        $expected = "something";

        $actual = Bend::bend($expected)->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 1.4);

        $actual = (new Bend($expected))->unfold();
        $this->assertNotNull($actual); // Issues w/ interface and trait inheritence
        $this->assertEqualsWithPerformance($expected, $actual, 1.4);
    }
}
