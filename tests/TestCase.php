<?php

namespace Eightfold\Foldable\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected $maxMilliseconds = 1;

    protected $start = 0;

    protected function assertEqualsWithPerformance(
        $expected,
        $actual,
        $maxMilliseconds = 0
    )
    {
        // setUp() return, set private var, etc.
        $accountForExtraWork = 1;

        $elapsed = hrtime(true) - $this->start;
        $milliseconds = $elapsed/1e+6 - $accountForExtraWork;

        $this->assertEquals($expected, $actual);

        $maxMilliseconds = ($maxMilliseconds === 0)
            ? $this->maxMilliseconds
            : $maxMilliseconds;

        $this->assertTrue(
            $milliseconds <= $maxMilliseconds,
            "{$milliseconds}ms is greater than {$maxMilliseconds}ms");
    }

    protected function setUp(): void
    {
        $this->start = hrtime(true);
    }
}
