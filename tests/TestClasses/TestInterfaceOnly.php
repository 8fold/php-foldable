<?php
declare(strict_types=1);

namespace Eightfold\Foldable\Tests\TestClasses;

use Eightfold\Foldable\Foldable;

class TestInterfaceOnly implements Foldable
{
    protected $main;
    protected $args;

    static public function fold(...$args): Foldable
    {
        return new static(...$args);
    }

    public function __construct(...$args)
    {
        $this->main = $args[0];
        unset($args[0]);
        $this->args = $args;
    }

    public function unfold()
    {
        return $this->main;
    }
}
