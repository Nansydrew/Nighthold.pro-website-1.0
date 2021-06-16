<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Faction extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['name'];

    public $timestamps = false;

    protected $casts = [
        'id' => 'integer',
    ];

    protected $table = "game_faction";
}
