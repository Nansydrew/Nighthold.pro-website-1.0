<?php

namespace App\Http\Controllers\LauncherApi;

use App\Http\Controllers\Controller;
use App\Http\Middleware\LocaleMiddleware;
use Launcher;

class ClientController extends Controller
{
    public function miniList($id)
    {
        return Launcher::getPatchlist(false, $id);
    }

    public function fullList($id)
    {
        return Launcher::getPatchlist(true, $id);
    }
}