<?php
declare(strict_types=1);

namespace Eightfold\Foldable\Fluent;

use Eightfold\Foldable\Fluent\Foldable;
use Eightfold\Foldable\Fluent\FoldableImp;

/**
 * Atomic class for developing fluent-based, as opposed to pipeline-based, APIs.
 *
 * You can extend this class. Use `fold()` to instantiate it and use `unfold()`
 * to receive the processed, final value.
 *
 * The first argument given to `fold()` is stored as `main`. Any other argument
 * added to the list is stored as a value in an `args` array.
 *
 * The primary point of extension is writing the conteents of the `unfold()`
 * method. Of course, you can write and overwrite as needed for your
 * use case.
 */
class Fold implements Foldable
{
    use FoldableImp;

    // private $args = [];

    // public static function fold(...$args): Foldable
    // {
    //     if (count($args) === 0) {
    //         return new Fold();
    //     }

    //     if (count($args) === 1) {
    //         return new Fold($args[0]);
    //     }

    //     $main = array_shift($args);
    //     return new Fold($main, ...$args);
    // }

    // private function __construct(
    //     private $main = null,
    //     ...$args)
    // {
    //     $this->args = $args;
    // }

    // public function main()
    // {
    //     return $this->main;
    // }

    // public function args(bool $includeMain = false): array
    // {
    //     return ($includeMain)
    //         ? array_merge([$this->main()], $this->args())
    //         : $this->args;
    // }

    // public function unfold()
    // {
    //     return (is_a($this->main(), Fold::class))
    //         ? $this->main()->unfold()
    //         : $this->main();
    // }
}
