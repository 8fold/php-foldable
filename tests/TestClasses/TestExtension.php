<?php
declare(strict_types=1);

namespace Eightfold\Foldable\Tests\TestClasses;

use Eightfold\Foldable\Fold;
use Eightfold\Foldable\Foldable;

class TestExtension extends Fold
{
    // TODO: PHP 8.0 string|Foldable
    public function __construct($string, ...$args)
    {
        if (! is_string($string) and ! is_a($string, Foldable::class)) {
            $class = get_class($this);
            $method = "__construct()";
            trigger_error("Argument 1 must be of type string or Foldable in {$class}::{$method}");
        }
        $this->main = $string;
        $this->args = $args;
    }

    public function unfold(): string
    {
        $build = "";
        foreach ($this->args as $value) {
            if (is_a($value, Foldable::class)) {
                $build .= $value->unfold();

            } elseif (is_string($value)) {
                $build .= $value;

            }
        }

        return (is_a($this->main, Foldable::class))
            ? $this->main->unfold() . $build
            : $this->main . $build;
    }
}
