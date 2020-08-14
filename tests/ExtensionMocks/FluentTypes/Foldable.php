<?php

namespace Eightfold\Foldable\Tests\ExtensionMocks\FluentTypes;

use Eightfold\Foldable\Foldable as FoldableInterface;
use Eightfold\Foldable\FoldableImp;

class Foldable implements FoldableInterface
{
    use FoldableImp;

    public function toggle()
    {
        $this->main = ! $this->main;
        return $this;
    }

    public function toggleFluent()
    {
        $bool = ! $this->main;
        return static::fold($bool);
    }
}
