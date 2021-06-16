<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use App\Services\Utils;
use Illuminate\Http\Request;
use Genert\BBCode\BBCode;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }


    public function index($channelId, Thread $thread)
    {
        return $thread->replies()->paginate(20);
    }

    public function report() {
        return Report::create([
            'topic_id' => request('thread'),
            'type' => request('type'),
            'reason' => request('reason'),
            'user_add' => \Auth::user()->id
        ]);
    }

    public function store(Thread $thread)
    {
        ///
        $bbCode = new BBCode();
        $bbCode->addParser(
            'custom-link',
            '/\[link=(.*?)\](.*?)\[\/link\]/s',
            '<a href="$1">$2</a>',
            '$1'
        );
        $bbCode->addParser(
            'quote',
            '/\[quote=(.*?)\](.*?)\[\/quote\]/s',
            '<blockquote><a href="$1">$2</a></blockquote>',
            '$1'
        );
        $index = rand(1, 15);
        $bbCode->addParser(
            'custom-link',
            '#\[video(.+?)\]#i',
            '<div id="player_'.$index.'"></div><script>var player = new Playerjs({id:"player_'.$index.'", $1});</script>',
            '$1'
        );
        $text = $this->getInLines($bbCode->convertToHtml(request('detail')));


        $thread->addReply([
            'parent_id' => $thread->id,
            'body' => $text,
            'user_id' => auth()->id(),
            'channel_id' => $thread->channel_id
        ])->load('creator');

        $thread->increment('replies_count');

        return back();
    }

    protected function getInLines($source){
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';
        return str_replace($order, $replace, $source);
    }

    public function update(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->update(request()->validate(['body' => 'required|spamfree']));
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }

        return back();
    }
}
