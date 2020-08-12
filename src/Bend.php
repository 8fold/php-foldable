<?php

namespace Eightfold\Foldable;

use League\Pipeline\Pipeline;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Foldable\Bendable;
use Eightfold\Foldable\BendableImp;

class Bend implements Foldable, Bendable
{
    use FoldableImp, BendableImp;

    public function __construct($payload, ...$bends)
    {
        $this->main = $payload;
        $this->args = $bends;
    }

    public function unfold()
    {
        return (new Pipeline(null, ...$this->args))->process($this->main);
    }

    public function __invoke($payload)
    {
        return $this->main;
    }
}
