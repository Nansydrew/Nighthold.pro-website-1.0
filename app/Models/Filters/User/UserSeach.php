<?php

namespace App\Models\Filters\User;

use App\Models\Globals\User;
use App\Services\Filters\BaseSeach;
use App\Services\Filters\Searchable;

class UserSeach implements Searchable
{

    const MODEL = User::class;

    use BaseSeach;

}