<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_user_players extends Model
{
  protected $table = 'team_user_players';
  protected $fillable = [
    'legacy_id', 'player_id', 'team_user_id', 'name', 'last_name', 'name_team', 'name_opponent','position', 'salary', 'points'
  ];

  public static function save_player($player_obj, $team_id) {

    $player                   = new Team_user_players();
    $player->legacy_id        =  $player_obj['legacy_id'];
    $player->player_id        =  $player_obj['id'];
    $player->team_user_id     =  $team_id;
    $player->name             =  $player_obj['name'];
    $player->last_name        =  $player_obj['last_name'];
    $player->name_team        =  $player_obj['name_team'];
    $player->name_opponent    =  $player_obj['name_opponent'];
    $player->position         =  $player_obj['position'];
    $player->salary           =  $player_obj['salary'];
    $player->points           =  $player_obj['points'];

     if ($player->save()) {
       return $player;
     } else {
       return false;
     }
  }

  public static function update_player($player_obj) {

    $player                   =  Team_user_players::find($player_obj['id']);
    $player->legacy_id        =  $player_obj['legacy_id'];
    $player->name             =  $player_obj['name'];
    $player->last_name        =  $player_obj['last_name'];
    $player->name_team        =  $player_obj['name_team'];
    $player->name_opponent    =  $player_obj['name_opponent'];
    $player->position         =  $player_obj['position'];
    $player->salary           =  $player_obj['salary'];
    $player->points           =  $player_obj['points'];

    if ($player->save()) {
      return $player;
    } else {
      return false;
    }
  }
}
