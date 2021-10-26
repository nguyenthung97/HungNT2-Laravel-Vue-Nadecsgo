<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'steam_id',
        'avatar',
        'last_seen',
        'role',
        'created_at',
        'updated_at',
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'email',
        'password',
        'id',
        'remember_token',
        'bio',
    ];

    public function videos(){
        return $this->hasMany(Video::class,'steam_id','steam_id');
    }

    public function getUserSinceAttribute(){
        return date('d-m-Y', strtotime($this->created_at));
    }

    public function isUser(){
        return $this->role=== 'user';
    }
}
