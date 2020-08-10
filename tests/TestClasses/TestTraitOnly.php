<?php
declare(strict_types=1);

namespace Eightfold\Foldable\Tests\TestClasses;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

class TestTraitOnly implements Foldable
{
    use FoldableImp;
}
