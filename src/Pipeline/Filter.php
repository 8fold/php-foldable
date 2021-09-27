<?php
declare(strict_types=1);

namespace Eightfold\Foldable\Pipeline;

// use League\Pipeline\Pipeline;

use Eightfold\Foldable\Fluent\Foldable;
use Eightfold\Foldable\Fluent\FoldableImp;

use Eightfold\Foldable\Pipeline\Filterable;
use Eightfold\Foldable\Pipeline\FilterableImp;

/**
 * A Filter is similar to a Fold in that it is the atomic class.
 *
 * See `Tests\Bends\ArrayToString` see how extending this class can reduce your
 * workload. All the other implementations replicate this skeleton for fine-
 * grained control. Extending this class is just easier.
 *
 * You will be required to write an `__invoke` method. We cannot add it the
 * defined interfaces while giving your flexibility for argument lists as
 * improved type safety.
 */
class Filter implements Foldable, Filterable
{
    use FoldableImp; // , FilterableImp;

    public static function applyWith(...$args): Filterable
    {
        return new Filter(...$args);
    }

    public static function apply(): Filterable
    {
        return static::applyWith();
    }

    public function unfoldUsing(...$args)
    {
        return $this($args);
    }

    public function __invoke($payload)
    {
        return $payload;
    }
}
