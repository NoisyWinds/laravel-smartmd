<?php

namespace NoisyWinds\Smartmd\Facades;

use Illuminate\Support\Facades\Facade;

class  Smartmd extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \NoisyWinds\Smartmd\Smartmd::class;
    }
}