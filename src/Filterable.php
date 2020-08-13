<?php

namespace Eightfold\Foldable;

use Eightfold\Foldable\Foldable;

interface Filterable
{
    static public function bend();

    static public function bendWith(...$args);
}
