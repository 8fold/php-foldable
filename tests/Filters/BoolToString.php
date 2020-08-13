<?php

namespace Eightfold\Foldable\Tests\Filters;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

class BoolToString implements Foldable
{
    use FoldableImp;

    /**
     * Does not take payload. Just addtional arguments for `__invoke()`.
     */
    static public function apply()
    {
        return static::applyWith();
    }

    static public function applyWith(...$args)
    {
        return new static(...$args);
    }

    public function __construct(...$args)
    {
        $this->args = $args;
    }

    public function return(): array
    {
        return $this->args;
    }

    public function __invoke(bool $payload): string
    {
        return ($payload) ? "true" : "false";
    }
}
