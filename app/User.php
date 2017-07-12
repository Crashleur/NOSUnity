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
      'email', 'password', 'firstname', 'lastname', 'birth', 'username', 'login', 'steam_id', 'whitelisted', 'twitch', 'youtube'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function games(){
        return $this->belongsToMany('App\Game');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function topics(){
        return $this->hasMany('App\Topic');
    }

    public function links(){
        return $this->hasMany('App\Link');
    }

    public function tournaments(){
        return $this->hasMany('App\Tournament');
    }

    public function teams_creator(){
        return $this->hasMany('App\Team', 'teams');
    }

    public function teams(){
        return $this->belongsToMany('App\Team');
    }

    public function user_types(){
        return $this->belongsToMany('App\UserType');
    }
}
