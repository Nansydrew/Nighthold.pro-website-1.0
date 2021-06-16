<?php

    namespace App\Models\Characters;

    use App\Models\CharactersTalent;
    use Illuminate\Database\Eloquent\Model;

    class Characters extends Model {

        public $timestamps = false;

        protected $connection = 'mysql';

        protected $table = 'user_characters';

        public  function scopeLike($query, $field, $value){
            return $query->where($field, 'LIKE', "%$value%");
        }

    }
