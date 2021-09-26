<?php
declare(strict_types=1);

namespace Eightfold\Foldable;

use Eightfold\Foldable\Foldable;

trait FoldableImp
{
    private $args = [];

    public static function fold(...$args): Foldable
    {
        if (count($args) === 0) {
            return new Fold();
        }

        if (count($args) === 1) {
            return new Fold($args[0]);
        }

        $main = array_shift($args);
        return new Fold($main, ...$args);
    }

    private function __construct(
        private $main = null,
        ...$args)
    {
        $this->args = $args;
    }

    public function main()
    {
        return $this->main;
    }

    public function args(bool $includeMain = false): array
    {
        return ($includeMain)
            ? array_merge([$this->main()], $this->args())
            : $this->args;
    }

    public function unfold()
    {
        return (is_a($this->main(), Fold::class))
            ? $this->main()->unfold()
            : $this->main();
    }
}
