<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class RacesAbility extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['name', 'description'];

    public $timestamps = false;

    public function raceId()
    {
        return $this->belongsTo(Races::class, 'race_id', 'id');
    }
}
