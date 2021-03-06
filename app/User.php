<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function status()
    {
        return $this->hasMany('App\Status');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function like()
    {
        return $this->hasMany('App\Like');
    }

    public function follow()
    {
        return $this->hasMany('App\Follow');
    }
}
