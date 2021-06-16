<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacesClass extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function raceId()  {
        return $this->hasMany(Races::class, 'id', 'id');
    }

    public function classId()  {
        return $this->hasMany(Classes::class, 'id', 'id');
    }

    public function info() {
        return $this->hasMany(Races::class, 'id', 'races_id');
    }
}
