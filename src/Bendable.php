<?php

namespace Eightfold\Foldable;

use League\Pipeline\StageInterface;

use Eightfold\Foldable\Foldable;

interface Bendable extends Foldable, StageInterface
{
    static public function bend($payload);

    static public function bendWith($payload, ...$args);
}
