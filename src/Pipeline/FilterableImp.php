<?php

namespace Eightfold\Foldable\Pipeline;

trait FilterableImp
{
    static function applyWith(...$args): Filterable
    {
        return new Filter(...$args);
    }

    static function apply(): Filterable
    {
        return static::applyWith();
    }

    function unfoldUsing(...$args)
    {
        return array_merge($this->args(includeMain: true), $args);
    }
}
