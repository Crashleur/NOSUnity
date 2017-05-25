<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  protected $fillable = [
      'title', 'description', 'open',
  ];

  public function links(){
      return $this->hasMany('App\Link');
  }

  public function messages(){
      return $this->belongsToMany('App\Message');
  }

  public function user(){
      return $this->belongsTo('App\User');
  }

  public function topic_type(){
      return $this->belongsTo('App\TopicType');
  }

  public function tournament(){
      return $this->hasOne('App\Tournament');
  }
}
