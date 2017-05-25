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
      'email', 'password', 'firstname', 'lastname', 'age', 'username', 'login', 'steam_id', 'whitelisted', 'twitch', 'youtube'
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

    public function link(){
        return $this->hasOne('App\Link');
    }

    public function tournaments(){
        return $this->hasMany('App\Tournament');
    }

    public function user_type(){
        return $this->belongsTo('App\UserType');
    }
}
