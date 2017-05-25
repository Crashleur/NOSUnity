<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicType extends Model
{
  protected $fillable = [
      'slug', 'name'
  ];

  public function link(){
      return $this->hasOne('App\Link');
  }

  public function topics(){
      return $this->belongsToMany('App\Topic');
  }
}
