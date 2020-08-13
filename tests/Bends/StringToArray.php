<?php

namespace Eightfold\Foldable\Tests\Bends;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Foldable\Filterable;
use Eightfold\Foldable\FilterableImp;

class StringToArray implements Foldable, Filterable
{
    use FoldableImp, FilterableImp;

    public function __invoke(string $payload): array
    {
        return preg_split('//u', $payload, -1, PREG_SPLIT_NO_EMPTY);
    }
}
