<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Homepage extends Model
{
    use HasFactory, Translatable;

    public $timestamps = false;

    protected $translatable = ['sub_title', 'title', 'description', 'slug_text', 'slug_text_two'];
}
