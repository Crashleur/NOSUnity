<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  protected $fillable = [
      'slug', 'name'
  ];

  public function user_types(){
      return $this->belongsToMany('App\UserType');
  }
}
