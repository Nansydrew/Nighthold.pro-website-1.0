<?php

namespace App\Http\Controllers;

use App\Models\Characters\Characters;
use App\Models\Characters\Guild;
use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request) {
        Meta::prependTitle('Поиск')
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        $post = Post::like('body', Str::ucfirst($request->get('q')))->get();
        $characters = Characters::like('name', Str::ucfirst($request->get('q')))->limit(10)->get();
        $guild = Guild::like('name', Str::ucfirst($request->get('q')))->get();
        return view('search.index', [
            'post' => $post,
            'characters' => $characters,
            'guild' => $guild
        ]);
    }

    public function character(Request $request) {
        Meta::prependTitle('Поиск')
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        return view('search.characters', [
            'characters' => Characters::like('name', Str::ucfirst($request->get('q')))->paginate(10)
        ]);
    }

    public function blog(Request $request) {
        Meta::prependTitle('Поиск')
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        if ($request->get('g')) {
            return view('search.blog', [
                'post' => Post::like('body', Str::ucfirst($request->get('q')))->paginate(25)
            ]);
        } else {
            $user = User::where('name', $request->get('a'))->first();
            return view('search.blog', [
                'post' => Post::where('author_id', $user->id)->orderBy('created_at', 'DESC')->paginate(25)
            ]);
        }
    }

    public function forum(Request $request): string
    {
        $q = request('q');
        $max_page = 10;
        $results = $this->searchForum($q, $max_page);
        return view('forum.search', [
            'result' => $results,
        ])->render();
    }

    public function searchForum($q, $count){
        $query = mb_strtolower($q, 'UTF-8');
        return Thread::where('title','LIKE','%'.$query.'%')->orWhere('body','LIKE','%'.$query.'%')->paginate($count);
    }
}
