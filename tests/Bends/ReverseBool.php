<?php

namespace Eightfold\Foldable\Tests\Bends;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Foldable\Filterable;
use Eightfold\Foldable\FilterableImp;

class ReverseBool implements Foldable, Filterable
{
    use FoldableImp, FilterableImp;

    public function __invoke(bool $payload): bool
    {
        return ! $payload;
    }
}
