<?php

namespace App\StatsApi;

Use DB;
Use App\Player;
Use App\Tournament;
Use App\Position;

class PlayersApi extends StatsApi {

/********************************************
* saveUpdatePlayers: Save or Update a player
* @param void
* @return void
********************************************/

  public static function saveUpdatePlayers () {

    //TO DO
    //****************************************
    //Sustituir '$update_at' por el del API
    //Solicitar para la consulta:
    //   -Status del player
    //****************************************

  $tournaments = DB::table('tournaments')->get();

    foreach($tournaments as $tournament) {

      $tournament_legacy_id = $tournament->legacy_id;
      $service              = 'tournaments/'. $tournament_legacy_id . '/players';
      $jsonApi              = StatsApi::get($service);
      $playerStatsApis      = json_decode($jsonApi);
      $updated_at           = '2017-07-12 15:58:03';
      $players              = DB::table('players')->get();

      if (is_array($playerStatsApis) || is_object($playerStatsApis)) {
        foreach( $playerStatsApis as $championship ) {
          foreach ($championship->tournament_teams as $tournament_teams) {
            foreach ($tournament_teams->player_tournament_teams as $player) {

              $playerStat = $player->player;

              $position = Position::select('name')->where('legacy_id', $playerStat->position_id)->first();
              $contador = 0;

              foreach( $players as $player ) {
                if ( $player->legacy_id == $playerStat->id ) { //&& ($player->legacy_stat_request < $updated_at) ) {
                  $contador = 1;

                  DB::table('players')
                  ->where( 'legacy_id', $playerStat->id )
                  ->update([
                   'team_id'             => $playerStat->team_id,
                   'championship_id'     => $championship->championship_id,
                   'name'                => $playerStat->name,
                   'last_name'           => $playerStat->last_name,
                   'position'            => $position->name,
                   'legacy_stat_request' => $updated_at
                   ]);
                }
              }
              if ($contador == 0) {

                $player                      =  new Player();
                $player->team_id             =  $playerStat->team_id;
                $player->championship_id     =  $championship->championship_id;
                $player->legacy_id           =  $playerStat->id;
                $player->name                =  $playerStat->name;
                $player->last_name           =  $playerStat->last_name;
                $player->points              =  0;
                $player->position            =  $position->name;
                $player->status              =  1;
                $player->legacy_stat_request =  $updated_at;
                $player->save();
              } 
            }
          }
        }
      }
    }
  }
}

