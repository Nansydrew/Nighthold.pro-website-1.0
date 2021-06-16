<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    protected $connection = 'auth';

    protected $table = 'account_banned';

    public $timestamps = false;
}
