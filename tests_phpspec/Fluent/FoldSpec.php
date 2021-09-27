<?php

namespace tests_phpspec\Eightfold\Foldable\Fluent;

use Eightfold\Foldable\Fluent\Fold;
use PhpSpec\ObjectBehavior;

class FoldSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough("fold");
    }

    public function it_uses_factory_initializer()
    {
        $this->shouldHaveType(Fold::class);
    }

    public function it_can_return_first_argument()
    {
        $this->beConstructedThrough("fold", ["Hello, World!"]);

        $this->main()->shouldReturn("Hello, World!");
    }

    public function it_can_return_second_argument()
    {
        $this->beConstructedThrough("fold", ["Hello, World!", "Hello, 8fold!"]);

        $this->args()->shouldReturn(["Hello, 8fold!"]);
    }

    public function it_can_return_all_arguments()
    {
        $this->beConstructedThrough("fold", ["Hello, World!", "Hello, 8fold!"]);

        $this->args(true)->shouldReturn(["Hello, World!", "Hello, 8fold!"]);
    }

    public function it_can_be_unfolded()
    {
        $this->beConstructedThrough("fold", ["Hello, World!"]);

        $this->unfold()->shouldReturn("Hello, World!");
    }

    public function it_unfolds_recursively()
    {
        $a = Fold::fold("Hello, World!");

        $this->beConstructedThrough("fold", [$a, "Hello, 8fold!"]);

        $this->unfold()->shouldReturn("Hello, World!");
    }
}
