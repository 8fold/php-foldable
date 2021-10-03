<?php

namespace Eightfold\Foldable\Pipeline;

trait FilterableImp
{
    public static function applyWith(mixed ...$args): Filterable
    {
        return new Filter(...$args);
    }

    public static function apply(): Filterable
    {
        return static::applyWith();
    }

    public function unfoldUsing(mixed ...$args): mixed
    {
        return array_merge($this->args(includeMain: true), $args);
    }
}
