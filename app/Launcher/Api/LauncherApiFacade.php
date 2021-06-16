<?php

namespace App\Launcher\Api;
use Illuminate\Support\Facades\Facade;

class LauncherApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'launcher_api';
    }
}