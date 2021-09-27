<?php

namespace Eightfold\Foldable\Pipeline;

// use Eightfold\Foldable\Fluent\Foldable;

interface Filterable
{
    static public function apply(): Filterable;

    static public function applyWith(...$args): Filterable;

    public function unfoldUsing($payload);
}
