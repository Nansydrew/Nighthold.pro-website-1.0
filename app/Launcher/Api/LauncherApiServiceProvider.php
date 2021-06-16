<?php

namespace App\Launcher\Api;

use Illuminate\Support\ServiceProvider;
use App\Launcher\Api\LauncherApi;

class LauncherApiServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->singleton('launcher_api', function($app) {
			return new LauncherApi();
		});
	}
}