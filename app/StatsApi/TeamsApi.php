<?php

namespace App\StatsApi;

use DB;
use App\Team;

class TeamsApi extends StatsApi {

/**************************************************
* saveUpdateTeams: Save or update teams
* @param void
* @return void
**************************************************/

public static function saveUpdateTeams () {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//***********************************************************

$tournaments = DB::table('tournaments')->get();

  foreach($tournaments as $tournament) {

    $tournament_legacy_id = $tournament->legacy_id;
    $service              = 'tournaments/'. $tournament_legacy_id . '/teams';
    $jsonApi              = StatsApi::get($service);
    $teamStats            = json_decode($jsonApi);
    $updated_at           = '2017-07-12 15:58:03';
    $teams                = DB::table('teams')->get();

    if (is_array($teamStats) || is_object($teamStats)) {

      foreach ( $teamStats->tournament_teams as $teamStat ) {

        if ( $teamStat->team->{"stadium_id"} == null ) {
          $stadium_id = null;
        } else {
          $stadium_id = $teamStat->team->{'stadium_id'};
        }

        $contador = 0;

        foreach($teams as $team) {
            if ($team->legacy_id === $teamStat->team->{"id"}) { // ($team->legacy_stat_request < $updated_at) ) {
              $contador = 1;

              DB::table('teams')
              ->where('legacy_id', $teamStat->team->{"id"})
              ->update([
               'stadium_id'          => $stadium_id,
               'name'                => $teamStat->team->{"name"},
               'nickname'            => $teamStat->team->{"nickname"},
               'logo'                => $teamStat->team->{"logo"},
               'president'           => $teamStat->team->{"president"},
               'coach'               => $teamStat->team->{"coach"},
               'history'             => $teamStat->team->{"history"},
               'legacy_stat_request' => $updated_at
               ]);
            }
          }
          if ($contador == 0) {

            $team                      =  new Team();
            $team->legacy_id           =  $teamStat->team->{"id"};
            $team->stadium_id          =  $stadium_id;
            $team->name                =  $teamStat->team->{"name"};
            $team->nickname            =  $teamStat->team->{"nickname"};
            $team->logo                =  $teamStat->team->{"logo"};
            $team->president           =  $teamStat->team->{"president"};
            $team->coach               =  $teamStat->team->{"coach"};
            $team->history             =  $teamStat->team->{"history"};
            $team->legacy_stat_request =  $updated_at;
            $team->save();
          }
        }
      }
    }
  }
}
