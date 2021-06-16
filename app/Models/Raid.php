<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Raid extends Model
{
    public function bosses() {
        return $this->belongsToMany(Boss::class, 'bosses_instance', 'raid_id', 'boss_id');
    }
}
