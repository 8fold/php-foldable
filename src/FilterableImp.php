<?php

namespace Eightfold\Foldable;

trait FilterableImp
{
    static public function apply()
    {
        return static::bendWith();
    }

    static public function applyWith(...$args)
    {
        return new static(...$args);
    }
}
