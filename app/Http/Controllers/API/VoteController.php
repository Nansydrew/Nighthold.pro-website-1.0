<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\HistoryPayment;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VoteController extends Controller
{
    private function updateVote() {
        $top = file(setting('site.mmotop_stats'));
        Storage::put('vote/vote.txt', $top);
    }

    public function vote() {
        self::updateVote();
        $url = file(storage_path('app/vote/vote.txt'));
        foreach ($url as $item) {
            $vote = explode("\t", $item);
            if ((count($vote) < 5) OR ($vote[3] == '')) {
                continue;
            }
            $check = Vote::where('votes_id', $vote[0])->first();
            if ($check === NULL) {
                Vote::create([
                    'votes_id' => $vote[0],
                    'name' => $vote[3],
                    'balance' => '5',
                    'vote' => $vote[4],
                    'ip' => $vote[2],
                    'voted_at' => $vote[1]
                ]);
            }
        }

        $data = Vote::where('name', Auth::user()->name)->orderBy('created_at', 'desc')->paginate(10);
        $data_done = Vote::where('name', Auth::user()->name)->where('complete', 1)->count();
        $count_vote = $data->count();
        return response()->json(['error' => false, 'data' => $data, 'vote_count' => $count_vote, 'vote_done' => $data_done]);
    }

    public function store(Request $request) {
        $data = Vote::where('id', $request->json('id'))->firstOrFail();
        if ($data['complete'] === 1) {
            return back();
        }
        $newBalance = Account::balance()->balans + $data['balance']; ///// Заменить
        $newBalanceVote = Auth::user()->vote_balance + $data['balance'];
        Account::setBalance($newBalance);
        User::setBalanceVote($newBalanceVote);
        Vote::where('id', $request->json('id'))->update(['complete' => 1]);
        HistoryPayment::create([
            'user_id' => Auth::user()->id,
            'service' => 'balance',
            'title' => 'Голосование за сервер',
            'price' => $data['balance'],
            'status' => '1',
        ]);
        return redirect('/dashboard/vote')->with('success', 'Награда успешно получена');
    }
}
