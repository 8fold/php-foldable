<?php

namespace Eightfold\Foldable\Pipeline;

// use League\Pipeline\Pipeline as LeaguePipeline;

use Eightfold\Foldable\Fluent\Foldable;
use Eightfold\Foldable\Fluent\FoldableImp;

class Pipe implements Foldable
{
    use FoldableImp;

    public function unfold()
    {
        $payload = $this->main();
        foreach ($this->args(false) as $filter) {
            if (is_callable($filter)) {
                $payload = $filter($payload);
            }
        }
        return $payload;
    }
}
