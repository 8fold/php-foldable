<?php
declare(strict_types=1);

namespace Eightfold\Foldable\Fluent;

interface Foldable
{
    public static function fold(...$args): Foldable;

    public function __construct($main = null, ...$args);

    public function main();

    public function args(bool $includeMain = false);

    public function unfold();
}
