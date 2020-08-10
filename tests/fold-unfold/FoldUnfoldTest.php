<?php

namespace Eightfold\Foldable\FoldUnfold;

use Eightfold\Foldable\Tests\TestCase;

use Eightfold\Foldable\Tests\TestClasses\TestMain;

class FoldUnfoldTest extends TestCase
{
    public function testCanFold()
    {
        $actual = TestMain::fold("string");
        $this->assertNotNull($actual);
    }
}
