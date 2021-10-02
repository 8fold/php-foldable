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
}
