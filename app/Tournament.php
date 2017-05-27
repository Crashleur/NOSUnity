<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
  protected $fillable = [
      'start_date', 'team_requirement_number', 'max_participate_team'
  ];

  public function topic(){
      return $this->hasOne('App\Topic');
  }

  public function game(){
      return $this->belongsTo('App\Game');
  }

  public function teams(){
      return $this->belongsToMany('App\Team');
  }

  public function user(){
      return $this->belongsTo('App\User');
  }
}
