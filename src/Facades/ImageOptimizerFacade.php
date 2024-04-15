<?php

namespace Wizzou\ImageOptimizer\Facades;

use Illuminate\Support\Facades\Facade;

class ImageOptimizerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'image-optimizer';
    }
}