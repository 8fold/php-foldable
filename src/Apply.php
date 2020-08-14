<?php

namespace Eightfold\Foldable;

abstract class Apply
{
    static public function __callStatic(string $filterName, array $arguments = [])
    {
        $filterName = ucfirst($filterName);
        $className = static::rootNameSpaceForFilters() ."\\". $filterName;
        return (count($arguments) === 0)
            ? $className::apply()
            : $className::applyWith(...$arguments);
    }

    abstract static public function rootNameSpaceForFilters();
}
