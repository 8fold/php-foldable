<?php

namespace Eightfold\Foldable\Tests\Bends;

use Eightfold\Foldable\Bend;

class ArrayToString extends Bend
{
    public function __invoke(array $payload, string $glue = ""): string
    {
        return implode($glue, $payload);
    }
}
