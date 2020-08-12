<?php

namespace Eightfold\Foldable;

trait BendableImp
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
