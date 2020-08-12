<?php

namespace Eightfold\Foldable;

trait BendableImp
{
    static public function bend($payload)
    {
        return static::bendWith($payload);
    }

    static public function bendWith($payload, ...$args)
    {
        return new static($payload, ...$args);
    }

    public function unfold()
    {
        return (new Pipeline(null, ...$this->args))->process($this->main);
    }
}
