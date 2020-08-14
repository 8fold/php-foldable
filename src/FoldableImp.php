<?php
declare(strict_types=1);

namespace Eightfold\Foldable;

use Eightfold\Foldable\Foldable;

trait FoldableImp
{
    protected $main = "";
    protected $args = [];

    static public function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(...$args)
    {
        if (count($args) > 0) {
            $this->main = $args[0];
            unset($args[0]);
            $this->args = $args;
        }
    }

    public function args($includeMain = false)
    {
        return ($includeMain and ! empty($this->main))
            ? array_merge([$this->main], $this->args)
            : $this->args;
    }

    public function unfold()
    {
        if (is_a($this->main, Foldable::class)) {
            return $this->main->unfold();
        }
        return $this->main;
    }
}
