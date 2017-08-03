<?php

namespace App\StatsApi;

use DB;
use App\Tournament;
use App\Tournament_group;
use Carbon\Carbon;
use App\Lib\Ddh\UtilityDate;

class TournamentGroupsApi extends StatsApi {

/**************************************************
* saveUpdateTournamentGroups: Save or team of user
* @param tournament_id
* @return void
**************************************************/

  public static function saveUpdateTournamentGroups () {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//***********************************************************

  $tournaments = DB::table('tournaments')->get();

    // foreach($tournaments as $tournament) {

      // $tournament_legacy_id = $tournament['legacy_id'];
      $service = 'tournaments/1/groups';
      $jsonApi  = StatsApi::get($service);
      $tournamentGroupStats   = json_decode($jsonApi);
      $updated_at          = '2017-07-12 15:58:03';
      $tournamentGroups    = DB::table('tournament_groups')->get();

      if (is_array($tournamentGroupStats) || is_object($tournamentGroupStats)) {

        foreach($tournamentGroupStats->tournament_groups as $tournamentGroupStat) {

          $contador = 0;
          $tournament_group_id = $tournamentGroupStat->tournament_group_id;

          foreach($tournamentGroups as $tournamentGroup) {

            if ( ($tournamentGroup->legacy_id === $tournamentGroupStat->id) && ( $tournamentGroupStat->tournament_group_id === null) ) { // ($tournamentGroup->legacy_stat_request < $updated_at) ) {
              $contador = 1;

              DB::table('tournament_groups')
              ->where('legacy_id', $tournamentGroupStat->id)
              ->update([
                       'tournament_id'       => $tournamentGroupStat->tournament_id,
                       'name'                => $tournamentGroupStat->name,
                       'description'         => $tournamentGroupStat->description,
                       'legacy_stat_request' => $updated_at
                       ]);
            }
          }
          if ( ($contador == 0) && ($tournament_group_id == null) ) {

            $tournament_group                      =  new Tournament_group();
            $tournament_group->legacy_id           =  $tournamentGroupStat->id;
            $tournament_group->tournament_id       =  $tournamentGroupStat->tournament_id;
            $tournament_group->name                =  $tournamentGroupStat->name;
            $tournament_group->description         =  $tournamentGroupStat->description;
            $tournament_group->legacy_stat_request =  $updated_at;
            $tournament_group->save();
          }
        }
      }
    // }
  }
}
