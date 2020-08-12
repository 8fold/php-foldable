<?php

namespace Eightfold\Foldable\Tests\Bends;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Foldable\Bendable;
use Eightfold\Foldable\BendableImp;

class ReverseBool implements Foldable, Bendable
{
    use FoldableImp, BendableImp;

    public function __invoke(bool $payload): bool
    {
        return ! $payload;
    }
}
