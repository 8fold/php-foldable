<?php

namespace Eightfold\Foldable\Tests\ExtensionMocks;

use Eightfold\Foldable\Apply as BaseApply;

class Apply extends BaseApply
{
    static public function rootNameSpaceForFilters()
    {
        return "Eightfold\\Foldable\\Tests\\ExtensionMocks\\PipeFilters";
    }
}
