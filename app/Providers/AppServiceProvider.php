<?php

namespace App\Providers;

use App\Models\Language;
use App\Services\Logs\Log;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Models\Page;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Log::Initialize(true, 2);

        view()->composer('layouts.providers.pages', function($view) {
            $view->with('pages', Page::where('status', 'ACTIVE')->get());
        });
    }
}
