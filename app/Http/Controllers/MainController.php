<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use App\Services\Posts\Posts;
use Butschster\Head\Facades\Meta;
use TCG\Voyager\Models\Post;

class MainController extends Controller
{
    public function index () {
        $data = (new Posts)->getHome();
        $content = Homepage::orderBy('sort', 'ASC')->get();
        Meta::prependTitle(setting('site.title'))
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        return view('dashboard', ['data' => $data, 'content' => $content]);
    }

    public function update () {
        $data = Post::where('category_id', 1)->orderBy('created_at', 'DESC')->simplePaginate();
        Meta::prependTitle('Описание обновления')
            ->setDescription('Прочитайте о самых свежих новинках и исправлениях для World of Warcraft.');
        return view('update', ['update' => $data]);
    }

    public function referral()
    {
        return config('app.url') . "?ref=" . \Hashids::encode(auth()->user()->id);
    }
}
