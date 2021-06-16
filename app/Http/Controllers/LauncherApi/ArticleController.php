<?php

namespace App\Http\Controllers\LauncherApi;

use App\Http\Controllers\Controller;

use Launcher;

class ArticleController extends Controller
{
	public function show()
	{
		return Launcher::getAllNews();
	}
}
