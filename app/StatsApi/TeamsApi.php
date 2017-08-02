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

/**************************************************************
//CODIGO PARA SOLICITAR LOS TEAMS POR TOURNAMENT_ID
//
// $tournaments = tournament::where('is_active', true)->get();

  // foreach($tournaments as $tournament) {
    
    // $tournament_legacy_id = $tournament['legacy_id'];
    // $service = 'tournaments/$tournament_legacy_id/teams';
    // $params  = StatsApi::login();
    // jsonApi  = StatsApi::service($service, $params);
    // $stats   = json_decode($jsonApi);
*///***********************************************************

  $updated_at = '2017-07-12 15:58:03';
  $teams      = DB::table('teams')->get();
  $teamStats  = json_decode(self::$allTeams);

  if (is_array($teamStats) || is_object($teamStat)) {

    foreach ( $teamStats[0]->tournament_teams as $teamStat ) {
// echo $teamStat->team->{"name"}. "\n";
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
             'logo'            => $teamStat->team->{"logo"},
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


static $allTeams = '[
{
  "id": 1,
  "championship_id": 1,
  "name": "MLB 2015-2016",
  "description": "MLB",
  "icon_updated_at": null,
  "icon_file_size": null,
  "icon_content_type": null,
  "icon_file_name": null,
  "start_date": "2015-12-04T00:00:00.000Z",
  "end_date": "2016-06-07T00:00:00.000Z",
  "is_active": false,
  "tournament_teams": [
  {
    "id": 1,
    "tournament_id": 1,
    "team_id": 1,
    "tournament_group_id": 1,
    "wins": 6,
    "draws": 8,
    "loses": 6,
    "scores": 90,
    "scores_allowed": 96,
    "classified": "primero",
    "points": 1,
    "games": 45,
    "scores_diff": 4,
    "team": {
      "id": 1,
      "city_id": 1,
      "stadium_id": 1,
      "name": "Tigres de Detroit",
      "nickname": "TD",
      "logo": "/icons/original/missing.png",
      "president": null,
      "coach": null,
      "history": null,
      "logo_file_name": null,
      "logo_content_type": null,
      "logo_file_size": null,
      "logo_updated_at": null,
      "stadium": {
        "id": 1,
        "city_id": 1,
        "name": "Estadio Universitario",
        "capacity": 300000,
        "description": "Estadio Universitario de Caracas"
      }
    }
  },
  {
    "id": 2,
    "tournament_id": 1,
    "team_id": 2,
    "tournament_group_id": 1,
    "wins": 6,
    "draws": 8,
    "loses": 6,
    "scores": 90,
    "scores_allowed": 96,
    "classified": "primero",
    "points": 1,
    "games": 45,
    "scores_diff": 4,
    "team": {
      "id": 2,
      "city_id": 1,
      "stadium_id": 1,
      "name": "New York Yankees",
      "nickname": "NY",
      "logo": "/icons/original/missing.png",
      "president": null,
      "coach": null,
      "history": null,
      "logo_file_name": null,
      "logo_content_type": null,
      "logo_file_size": null,
      "logo_updated_at": null,
      "stadium": {
        "id": 1,
        "city_id": 1,
        "name": "Estadio Universitario",
        "capacity": 300000,
        "description": "Estadio Universitario de Caracas"
      }
    }
  }
  ]
}
]';

}
