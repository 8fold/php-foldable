<?php

namespace Eightfold\Foldable;

trait FilterableImp
{
    static public function bend()
    {
        return static::bendWith();
    }

    static public function bendWith(...$args)
    {
        return new static(...$args);
    }
}
