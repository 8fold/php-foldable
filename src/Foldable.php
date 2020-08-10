<?php
declare(strict_types=1);

namespace Eightfold\Foldable;

interface Foldable // extends PhpMagicMethods
{
    /**
     * No generic implementation. Acts as reminder to developers to performance
     * whatever level of sanitization they like on the one required part of
     * the constructor.
     *
     * @param  any    $main Any assignable value.
     *
     * @return any          Becomes value return of `main()`.
     */
    // static public function processedMain($main);

    /**
     * Generic implementation returns the original array of `args` unchanged.
     *
     * @param  [any]  $args Any valid series of values.
     *
     * @return any          Becomes value return of `args()`.
     */
    // static public function processedArgs(...$args);

    /**
     * Static constructor.
     *
     * Affords standard-input.
     *
     * @param  any    $main See processedMain()
     * @param  [any]  $args See processedArgs()
     *
     * @return class        Custom type implementing Foldable interface.
     */
    static public function fold(...$args): Foldable;

    /**
     * Return a single value that has, presumably, been manipulated or changed
     * in some way since it was folded.
     *
     * Affords standard-output.
     *
     * @return any
     */
    public function unfold();

    // public function if($bool, Closure $closure = null);

    // TODO: Consider a method called "if" - then deprecate
    // TODO: Can this be made to always return a Foldable?? Don't think so.
    // public function condition($bool, Closure $closure = null);
}
