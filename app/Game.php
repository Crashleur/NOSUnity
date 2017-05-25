<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  protected $fillable = [
      'name'
  ];

  public function link(){
      return $this->hasOne('App\Link');
  }

  public function users(){
      return $this->belongsToMany('App\User');
  }

  public function tournaments(){
      return $this->hasMany('App\Tournament');
  }

  public function user_types(){
      return $this->hasMany('App\UserType');
  }
}
