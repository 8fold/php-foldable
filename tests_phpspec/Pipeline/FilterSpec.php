<?php

namespace tests_phpspec\Eightfold\Foldable\Pipeline;

use Eightfold\Foldable\Pipeline\Filter;
use PhpSpec\ObjectBehavior;

class FilterSpec extends ObjectBehavior
{
    public function it_uses_factory_initializer()
    {
        $this->shouldHaveType(Filter::class);
    }

    public function it_can_be_invoked()
    {
        $this(false)->shouldReturn(false);
    }

    public function it_can_be_invoked_with_a_payload()
    {
        $this(true)->shouldReturn(true);
    }

    public function it_can_be_applied()
    {
        $this->beConstructedThrough("apply");

        $this->shouldHaveType(Filter::class);
    }

    public function it_can_be_applied_with_arguments()
    {
        $this->beConstructedThrough("applyWith", ["Hello, World!"]);

        $this->main()->shouldReturn("Hello, World!");

        $this->unfold()->shouldReturn("Hello, World!");
    }

    public function it_can_be_unfolded()
    {
        $this->beConstructedThrough("applyWith", ["Hello, World!"]);

        $this->unfold()->shouldReturn("Hello, World!");
    }

    public function it_can_be_unfolded_with_arguments()
    {
        $this->beConstructedThrough("applyWith", ["Hello, World!"]);

        $this->unfoldUsing("Hello, 8fold!")->shouldReturn(["Hello, 8fold!"]);
    }
}
