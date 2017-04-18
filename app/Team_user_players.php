<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_user_players extends Model
{
  protected $table = 'team_user_players';
  protected $fillable = [
    'legacy_id', 'player_id', 'team_user_id', 'name', 'last_name', 'position', 'salary', 'points'
  ];

  public static function save_player($pa_s, $team_id)
  {
    $pa                   = new Team_user_players();
    $pa->legacy_id        =  $pa_s->legacy_id;
    $pa->player_id        =  $pa_s->id;
    $pa->team_user_id     =  $team_id;
    $pa->name             =  $pa_s->name;
    $pa->last_name        =  $pa_s->last_name;
    $pa->position         =  $pa_s->position;
    $pa->salary           =  $pa_s->salary;
    $pa->points           =  $pa_s->points;
    $pa->save();
  }
  //
}
