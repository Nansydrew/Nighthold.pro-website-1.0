<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Talents extends Model
{
    use HasFactory, Translatable;

    protected $translatable = ['name', 'description'];

    public $timestamps = false;

    public function classId() {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
