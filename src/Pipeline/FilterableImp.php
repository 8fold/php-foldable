<?php

namespace Eightfold\Foldable\Pipeline;

trait FilterableImp
{
    public static function applyWith(...$args): Filterable
    {
        return new Filter(...$args);
    }

    public static function apply(): Filterable
    {
        return static::applyWith();
    }

    public function unfoldUsing(...$args)
    {
        return array_merge($this->args(includeMain: true), $args);
    }
}
