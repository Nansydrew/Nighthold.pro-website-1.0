<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharactersTalent extends Model
{
    use HasFactory;

    protected $connection = 'characters';

    protected $table = 'character_talent';

    public function talents() {
        return $this->hasMany(Talent::class, 'talent', 'talent');
    }
}
