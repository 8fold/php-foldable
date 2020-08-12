<?php

namespace Eightfold\Foldable;

use Eightfold\Foldable\Foldable;

interface Bendable extends Foldable
{
    static public function bend($payload);

    static public function bendWith($payload, ...$args);

    public function __invoke($payload, ...$args);
}
