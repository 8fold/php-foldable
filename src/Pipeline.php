<?php

namespace Eightfold\Foldable;

use League\Pipeline\Pipeline as LeaguePipeline;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

class Pipeline implements Foldable
{
    use FoldableImp;

    public function unfold()
    {
        return (new LeaguePipeline(null, ...$this->args))->process($this->main);
    }
}
