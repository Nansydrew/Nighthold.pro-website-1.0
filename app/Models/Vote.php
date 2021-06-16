<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'users_vote';
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function complete() {
        return $this->hasOne(Votes::class, 'name', 'name');
    }

    public function user() {
        return $this->belongsTo(Votes::class, 'vote_id', 'votes_id');
    }
}
