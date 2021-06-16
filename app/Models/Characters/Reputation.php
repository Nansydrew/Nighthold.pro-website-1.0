<?php

namespace App\Models\Characters;

use App\Models\Fraction;
use Illuminate\Database\Eloquent\Model;

class Reputation extends Model {

    public $timestamps = false;

    protected $connection = 'characters';

    protected $table = 'character_reputation';
}
