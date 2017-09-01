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

  public static function save_player($player_obj, $team_id, $type_play) {

    $player                   = new Team_user_players();
    $player->player_id        =  $player_obj['id'];
    $player->team_user_id     =  $team_id;
    $player->name             =  $player_obj['name'];
    $player->last_name        =  $player_obj['last_name'];
    $player->name_team        =  $player_obj['name_team'];
    $player->name_opponent    =  $player_obj['name_opponent'];

    if ($type_play == 'TURBO') {

      if ( $player_obj['position'] == '2B' || $player_obj['position'] == 'SS' ) {
        $player->position          = 'MI';
      } elseif ( $player_obj['position'] == '1B' || $player_obj['position'] == '3B' ) {
            $player->position          = 'CI' ;
      } else {
            $player->position         =  $player_obj['position'];
      }
    } elseif ($type_play == 'REGULAR') {
        $player->position         =  $player_obj['position'];
    }

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

  public static function save_team_edited($players, $team_user_id, $type_play) {

      DB::table('team_user_players')
      ->where('team_user_id', '=', $team_user_id)
      ->delete();

    foreach ($players as $player) {

      $team_user_player                =  new Team_user_players();
      $team_user_player->player_id     =  $player->player_id;
      $team_user_player->team_user_id  =  $team_user_id;
      $team_user_player->name          =  $player->name;
      $team_user_player->last_name     =  $player->last_name;
      $team_user_player->name_team     =  $player->name_team;
      $team_user_player->name_opponent =  $player->name_opponent;
      $team_user_player->position      =  $player->position;
      $team_user_player->salary        =  $player->salary;
      $team_user_player->points        = 0;
      $team_user_player->save();

    }

    return $team_user_player;
  }

}
