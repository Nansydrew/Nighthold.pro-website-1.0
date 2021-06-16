<?php

namespace App\Models\Filters\User;

use App\Services\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Banned implements Filterable
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->whereNotNull('banned_at');
    }
}