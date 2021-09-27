<?php
declare(strict_types=1);

namespace Eightfold\Foldable\Fluent;

use Eightfold\Foldable\Fluent\Foldable;

trait FoldableImp
{
    private $args = [];

    public static function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(...$args)
    {
        $this->args = $args;
    }

    public function main()
    {
        $a = $this->args(true);
        return array_shift($a);
    }

    public function args(bool $includeMain = false): array
    {
        if ($includeMain) {
            return $this->args;
        }

        $a = $this->args;
        array_shift($a);

        return $a;
    }

    public function unfold()
    {
        return (is_a($this->main(), Fold::class))
            ? $this->main()->unfold()
            : $this->main();
    }
}
