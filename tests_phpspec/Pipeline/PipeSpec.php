<?php

namespace tests_phpspec\Eightfold\Foldable\Pipeline;

use Eightfold\Foldable\Pipeline\Pipe;
use PhpSpec\ObjectBehavior;

class PipeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Pipe::class);
    }
}
