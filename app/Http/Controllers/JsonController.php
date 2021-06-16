<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\ThreadVote;
use App\Models\User;
use App\Services\Logs\Log;
use Genert\BBCode\BBCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{

    public function notifications()
    {
        return response()->json([
            "totalNotifications" => 0
        ]);
    }

    public function update()
    {
        return [];
    }

    public function block(Request $request, $id) {
        $user = User::find($id);

        $user->bans()->create([
            'expired_at' => '+' . $request->query('type') . ' day',
            'comment'=> $request->query('reason')
        ]);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole('Заблокированные');

        Log::WriteLog(__('account.account_12_1', ['name' => $user->name]));
    }

    public function report() {
        return Report::create([
            'topic_id' => request('thread'),
            'type' => request('type'),
            'reason' => request('reason'),
            'user_add' => Auth::user()->id
        ]);
    }

    public function sticky($id) {
        Thread::where('id', $id)->update(['sticky' => '1']);
    }

    public function unsticky($id) {
        Thread::where('id', $id)->update(['sticky' => '0']);
    }

    public function closed($id) {
        Thread::where('id', $id)->update(['locked' => '1']);
    }

    public function unclosed($id)
    {
        Thread::where('id', $id)->update(['locked' => '0']);
    }

    public function up($id) {
        if (ThreadVote::where('threads_id', $id)->where('user_id', Auth::user()->id)->first()){
            $up = Thread::where('id', $id)->first();
            return response()->json([
                'toggleRankMode' => $up->up
            ]);
        }
        Thread::where('id', $id)->increment('up', 1);
        ThreadVote::create([
            'threads_id' => $id,
            'user_id' => Auth::user()->id
        ]);
        $up = Thread::where('id', $id)->first();
        return response()->json([
            'toggleRankMode' => $up->up
        ]);
    }

    public function edit($id) {
        $bbCode = new BBCode();
        $bbCode->addParser(
            'custom-link',
            '/\[link=(.*?)\](.*?)\[\/link\]/s',
            '<a href="$1">$2</a>',
            '$1'
        );
        $text = $this->getInLines($bbCode->convertToHtml(request('detail')));
        $thead = Thread::where('id', $id)->update(['body' => $text]);
        return response()->json([
            'detail' => $text
        ]);
    }

    protected function getInLines($source){
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';
        return str_replace($order, $replace, $source);
    }

    public function frag($id) {
        $thread = Thread::where('id', $id)->firstOrFail();
        $bbCode = new BBCode();
        $bbCode->addParser(
            'custom-link',
            '/\[link=(.*?)\](.*?)\[\/link\]/s',
            '<a href="$1">$2</a>',
            '$1'
        );
        $text = $bbCode->convertToHtml($thread->body);
        return response()->json([
            'name' => $thread->id,
            'detail' => $text
        ]);
    }

    public function delete($topic)
    {
        Thread::where('id', $topic)->delete();

        if (request()->wantsJson()) {
            return redirect()->back();
        }
        return redirect()->back();
    }

}
