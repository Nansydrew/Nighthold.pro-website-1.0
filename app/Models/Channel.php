<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Channel extends Model
    {

        protected $guarded = [];
        protected $dates = ['expired_at'];

        public function threads()
        {
            return $this->hasMany(Thread::class);
        }

        public function forums()
        {
            return $this->hasMany(Channel::class, 'parent_id');
        }

        public function parentId()
        {
            return $this->belongsTo(self::class);
        }
    }
