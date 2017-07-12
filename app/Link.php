<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $casts = [
        'config' => 'array'
    ];

    protected $fillable = [
        'destination', 'type'
    ];

    public function message(){
        return $this->belongsTo('App\Message');
    }

    public function topic(){
        return $this->belongsTo('App\Topic');
    }

    public function user(){
        return $this->belongsToOne('App\User');
    }

    public function team(){
        return $this->hasOne('App\Team');
    }

    public function user_type(){
        return $this->hasOne('App\UserType');
    }

    public function topic_type(){
        return $this->hasOne('App\TopicType');
    }

    public function game(){
        return $this->hasOne('App\Game');
    }
}
