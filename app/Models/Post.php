<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Post extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['title', 'excerpt', 'body'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }
}
