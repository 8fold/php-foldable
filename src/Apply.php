<?php

namespace Eightfold\Foldable;

use Eightfold\Foldable\Filterable;

abstract class Apply
{
    // TODO: type check return Filterable
    static public function __callStatic(string $filterName, array $arguments = [])
    {
        $filterName = ucfirst($filterName);
        $className = static::rootNameSpaceForFilters() ."\\". $filterName;
        if (! static::filterClassExists($className)) {
            trigger_error("Filterable not found: {$className}");
        }
        return (count($arguments) === 0)
            ? $className::apply()
            : $className::applyWith(...$arguments);
    }

    // TODO: type check return - boolean
    static public function filterClassExists(string $className)
    {
        return class_exists($className) and
            in_array(Filterable::class, class_implements($className));
    }

    // TODO: type check return - string
    abstract static public function rootNameSpaceForFilters();
}
