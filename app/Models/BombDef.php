<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BombDef extends Model
{
    use HasFactory;

    protected $table = 'bombs_defs';

    public function positions(){
        return $this->hasMany(Position::class);
    }

    
}
