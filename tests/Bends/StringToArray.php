<?php

namespace Eightfold\Foldable\Tests\Bends;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Foldable\Bendable;
use Eightfold\Foldable\BendableImp;

class StringToArray implements Foldable, Bendable
{
    use FoldableImp, BendableImp;

    public function __invoke(string $payload): array
    {
        return preg_split('//u', $payload, -1, PREG_SPLIT_NO_EMPTY);
    }
}
