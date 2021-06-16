<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{

    public function handle($request, Closure $next)
    {
        $langPrefix = ltrim($request->route()->getPrefix(),'/');
        if($langPrefix) {
            App::setLocale($langPrefix);
        }
        return $next($request);
    }
}
