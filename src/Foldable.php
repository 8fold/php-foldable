<?php
declare(strict_types=1);

namespace Eightfold\Foldable;

interface Foldable
{
    static public function fold(...$args): Foldable;

    public function unfold();

    // public function if($bool, Closure $closure = null);

    // TODO: Consider a method called "if" - then deprecate
    // TODO: Can this be made to always return a Foldable?? Don't think so.
    // public function condition($bool, Closure $closure = null);
}
