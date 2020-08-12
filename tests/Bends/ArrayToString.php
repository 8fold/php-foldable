<?php

namespace Eightfold\Foldable\Tests\Bends;

use Eightfold\Foldable\Bend;

class ArrayToString extends Bend
{
    private $glue = "";

    public function __construct(string $glue = "")
    {
        $this->glue = $glue;
    }

    public function __invoke(array $payload): string
    {
        return implode($this->glue, $payload);
    }
}
