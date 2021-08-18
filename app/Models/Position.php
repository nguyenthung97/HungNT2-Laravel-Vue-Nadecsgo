<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';


    public $timestamps = false;

    public function maps(){
        return $this->belongsTo(Map::class);
    }

    public function bombs(){
        return $this->belongsTo(BombDef::class,'bomb_id');
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }
}
