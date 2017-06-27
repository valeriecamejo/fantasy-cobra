<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team_user_players extends Model {

  protected $table = 'team_user_players';
  protected $fillable = [
    'legacy_id',
    'player_id',
    'team_user_id',
    'name',
    'last_name',
    'name_team',
    'name_opponent',
    'position',
    'salary',
    'points'
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

/********************************************
* playersByTeam: Find players on a team
* @param $team_id
* @return $players
********************************************/

  public static function playersByTeam($team_id) {

    $players = DB::table('players')
             ->select('players.*', 'team_user_players.name_team', 'team_user_players.name_opponent')
             ->join('team_user_players', 'team_user_players.player_id', '=', 'players.id')
             ->where('team_user_players.team_user_id', '=', $team_id)
             ->get();

    return $players;
  }

/********************************************
* save_team_edited: Save team of user
* @param $players
* @return $players
********************************************/

  public static function save_team_edited($players, $team_user_id) {

    foreach ($players as $player) {
      $ret = DB::table('team_user_players')
        ->where('team_user_id', $team_user_id)
        ->where('position', $player->position)
        ->update([
                 'legacy_id'      => 1,
                 'player_id'      => $player->player_id,
                 'name'           => $player->name,
                 'last_name'      => $player->last_name,
                 'name_team'      => $player->name_team,
                 'name_opponent'  => $player->name_opponent,
                 'salary'         => $player->salary,
          ]);
      }

    return $ret;
  }

}
