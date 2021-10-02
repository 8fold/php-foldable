<?php

namespace tests_phpspec\Eightfold\Foldable\Pipeline;

use Eightfold\Foldable\Pipeline\Apply;
use PhpSpec\ObjectBehavior;

class ApplySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Apply::class);
    }
}
