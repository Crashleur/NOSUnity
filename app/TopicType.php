<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicType extends Model
{
    const $annonce = "ANNONCE";
    const $reunion = "REUNION";


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
