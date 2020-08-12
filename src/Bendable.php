<?php

namespace Eightfold\Foldable;

use Eightfold\Foldable\Foldable;

interface Bendable
{
    static public function bend();

    static public function bendWith(...$args);
}
