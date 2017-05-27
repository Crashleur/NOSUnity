<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $fillable = [
      'name'
  ];

  public function link(){
      return $this->hasOne('App\Link');
  }

  public function game(){
      return $this->belongsTo('App\Game');
  }

  public function creator(){
      return $this->belongsTo('App\User', 'user_id');
  }

  public function users(){
      return $this->belongsToMany('App\User');
  }

  public function tournaments(){
      return $this->belongsToMany('App\Tournament');
  }
}
