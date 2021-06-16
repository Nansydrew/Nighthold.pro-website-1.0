<?php

namespace App\Models\Characters;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;

class Arena extends Model
{
    protected $connection = 'characters';

    protected $table = 'character_arena_data';

    protected $fillable = [
        "guid",
        "slot",
        "rating",
        "bestRatingOfWeek",
        "bestRatingOfSeason",
        "matchMakerRating",
        "weekGames",
        "weekWins",
        "prevWeekGames",
        "prevWeekWins",
        "seasonGames",
        "seasonWins"
    ];

    public function characters() {
        return $this->belongsTo(Characters::class, 'guid', 'guid');
    }

    public function account() {
        return $this->belongsTo(Account::class, 'guid', 'id');
    }
}
