<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
  protected $fillable = [
      'slug', 'rôle_admin',
  ];

  public function link(){
      return $this->hasOne('App\Link');
  }

  public function permissions(){
      return $this->belongsToMany('App\Permission');
  }

  public function users(){
      return $this->hasMany('App\User');
  }

  public function game(){
      return $this->belongsTo('App\Game');
  }
}
