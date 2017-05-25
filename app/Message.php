<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
      'decription'
  ];

  public function links(){
      return $this->hasMany('App\Link');
  }

  public function user(){
      return $this->belongsTo('App\User');
  }

  public function topic(){
      return $this->belongsTo('App\Topic');
  }

}
