<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        Meta::prependTitle('Новости')
            ->setDescription('Все последние новости о World of Warcraft, включая сообщения разработчиков и уведомления о выходе обновлений.');
        $firstnews = Post::all()->where('status','PUBLISHED')->reverse()->take(1);
        $lastnews = Post::all()->where('status','PUBLISHED')->reverse()->skip(1)->take(5);
        $dataToEliminate = Post::orderBy('created_at','desc')->take(6)->select('id')->pluck('id');
        $news = Post::whereNotIn('id', $dataToEliminate)->orderBy('created_at','desc')->skip(6)->simplePaginate(10);
        $num = 0;
        return view('news.index', compact('firstnews','lastnews','news','num'));
    }

    public function frag() {
        $dataToEliminate = Post::orderBy('created_at','desc')->take(6)->select('id')->pluck('id');
        $news = Post::whereNotIn('id', $dataToEliminate)->orderBy('created_at','desc')->skip(6)->simplePaginate(10);
        return view('news.frag', [
            'news' => $news
        ]);
    }

    public function show($id) {
        $post = Post::where('id', $id)->firstOrFail();
        Meta::prependTitle($post->title)
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        return view('news.show', ['post' => $post]);
    }
}
