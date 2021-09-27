<?php

namespace Eightfold\Foldable\Pipeline;

// use Eightfold\Foldable\Fluent\Foldable;

interface Filterable
{
    public static function applyWith(...$args): Filterable;

    public static function apply(): Filterable;

    public function unfoldUsing(...$args);
}
