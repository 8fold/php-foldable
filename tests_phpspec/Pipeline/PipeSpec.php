<?php

namespace tests_phpspec\Eightfold\Foldable\Pipeline;

use Eightfold\Foldable\Pipeline\Pipe;
use PhpSpec\ObjectBehavior;

use tests_phpspec\Eightfold\Foldable\Extensions\Append;

class PipeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Pipe::class);
    }

    public function it_can_be_folded_and_unfolded()
    {
        $this->beConstructedThrough("fold", ["Hello, World!"]);

        $this->unfold()->shouldReturn("Hello, World!");
    }
}
