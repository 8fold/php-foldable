<?php

declare(strict_types=1);

namespace Eightfold\Foldable\Fluent;

interface Foldable
{
    public static function fold(mixed ...$args): Foldable;

    public function __construct(mixed ...$args);

    public function main(): mixed;

    /**
     * @param  bool|boolean $includeMain
     * @return array<mixed>
     */
    public function args(bool $includeMain = false): array;

    public function unfold(): mixed;
}
