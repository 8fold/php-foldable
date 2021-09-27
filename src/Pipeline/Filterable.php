<?php

namespace Eightfold\Foldable\Pipeline;

// use Eightfold\Foldable\Fluent\Foldable;

interface Filterable
{
    static public function apply();

    static public function applyWith(...$args);

    public function unfoldUsing($payload);
}
