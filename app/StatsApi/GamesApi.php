<?php

namespace App\StatsApi;

use DB;
use App\Game;
use DateTime;
use App\Tournament;


class GamesApi extends StatsApi {

/**************************************************
* saveUpdateGames: Save or update games
* @param $star_date, $end_date
* @return void
**************************************************/

  public static function saveUpdateGames () {

  //***********************************************************
  //Sustituir el legacy_stat_request por el updated_at del API
  //Sustituir el tournament_id en la consulta del $games
  //***********************************************************

  $tournaments = tournament::where('is_active', true)->get();

    foreach($tournaments as $tournament) {

      $tournament_id = $tournament['id'];
      $tournament_legacy_id = $tournament['legacy_id'];
      $service = 'tournaments/'. $tournament_legacy_id . '/games';
      $jsonApi  = StatsApi::get($service);
      $gameStatsApis = array();
      $gameStatsApis = json_encode($jsonApi);

 
      $updated  = date("Y-m-d H:i:s e");
      $games     = DB::table('games')->where('tournament_id', $tournament_id)->get();

      if (is_array($gameStatsApis) || is_object($gameStatsApis)) {

        foreach($gameStatsApis[0]->tournament_groups as $gameStatsApi) {

          foreach($gameStatsApi->games as $gameStat) {
            $contador          = 0;
            $start_date        = new DateTime($gameStat->start_date);
            $end_date          = new DateTime($gameStat->end_date);
            $updated_at        = new DateTime($updated);
            foreach($games as $game) {
            if ( $gameStat->id === $game->legacy_id ) { // && ($game->legacy_stat_request < $updated_at){

              $contador = 1;

              DB::table('games')
              ->where('legacy_id', $gameStat->id)
              ->update([
               'tournament_id'       => $gameStat->tournament_id,
               'tournament_group_id' => $gameStat->tournament_group_id,
               'team_id_home'        => $gameStat->team_home->{"id"},
               'team_id_away'        => $gameStat->team_away->{"id"},
               'start_date'          => $start_date,
               'end_date'            => $end_date,
               'score_home'          => $gameStat->score_home,
               'score_away'          => $gameStat->score_away,
               'status'              => $gameStat->status,
               'schema_team_home'    => $gameStat->schema_team_home,
               'schema_team_away'    => $gameStat->schema_team_away,
               'mvp'                 => $gameStat->mvp,
               'legacy_stat_request' => $updated_at
               ]);
            }
          }
            if ($contador == 0) {

              $game                      = new Game();
              $game->legacy_id           = $gameStat->id;
              $game->tournament_id       = $gameStat->tournament_id;
              $game->tournament_group_id = $gameStat->tournament_group_id;
              $game->team_id_home        = $gameStat->team_home->{"id"};
              $game->team_id_away        = $gameStat->team_away->{"id"};
              $game->start_date          = $start_date;
              $game->end_date            = $end_date;
              $game->score_home          = $gameStat->score_home;
              $game->score_away          = $gameStat->score_away;
              $game->status              = $gameStat->status;
              $game->schema_team_home    = $gameStat->schema_team_home;
              $game->schema_team_away    = $gameStat->schema_team_away;
              $game->mvp                 = $gameStat->mvp;
              $game->legacy_stat_request = $updated_at;
              $game->save();

              return $game;
            }
          }
        }
      }
    }
  }

}
