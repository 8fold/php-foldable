<?php

declare(strict_types=1);

namespace Eightfold\Foldable\Fluent;

use Eightfold\Foldable\Fluent\Foldable;

trait FoldableImp
{
    /**
     * @var array<mixed>
     */
    private array $args = [];

    public static function fold(mixed ...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(mixed ...$args)
    {
        $this->args = $args;
    }

    public function main(): mixed
    {
        $a = $this->args(true);
        return array_shift($a);
    }

    /**
     * @param  bool|boolean $includeMain
     * @return array<mixed>
     */
    public function args(bool $includeMain = false): array
    {
        if ($includeMain) {
            return $this->args;
        }

        $a = $this->args;
        array_shift($a);

        return $a;
    }

    public function unfold(): mixed
    {
        return (is_a($this->main(), Fold::class))
            ? $this->main()->unfold()
            : $this->main();
    }
}
