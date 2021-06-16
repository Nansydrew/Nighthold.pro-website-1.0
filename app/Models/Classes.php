<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Classes extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['name', 'description', 'talent_descr', 'card_subtitle', 'card_description'];

    public $timestamps = false;

    public function ability()
    {
        return $this->hasMany(ClassesAbility::class, 'race_id', 'id');
    }

    public function talents() {
        return $this->hasMany(Talents::class, 'class_id', 'id');
    }

    public function races() {
        return $this->belongsToMany(Races::class, 'class_race', 'classes_id');
    }
}
