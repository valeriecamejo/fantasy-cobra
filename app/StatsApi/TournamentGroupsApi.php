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


/**************************************************************
//CODIGO PARA SOLICITAR LOS TOURNAMENT_GROUP POR TOURNAMENT_ID
//
// $tournaments = tournament::where('is_active', true)->get();
//
  // foreach($tournaments as $tournament) {

    // $service = 'tournaments/$tournament_legacy_id/groups';
    // $params  = StatsApi::login();
    // jsonApi  = StatsApi::service($service, $params);
    // $stats   = json_decode($jsonApi);

  // $tournament_id        = $tournament['id'];
  // $tournament_legacy_id = $tournament['legacy_id'];
*///***********************************************************
    
      $tournament_id       = 1;
      $updated_at          = '2017-07-12 15:58:03';
      $tournamentGroups    = DB::table('tournament_groups')->get();

//*****************************************************************************************************
//Al reaizar la consulta al Api, debe sustituirse la linea anterior por la siguiente linea de codigo:
// $tournamentGroups     = tournament_group::where('tournament_id', $tournament_id)->get();
//*****************************************************************************************************
     
      $tournamentGroupStats = json_decode(self::$allTournamentGroups);

      if (is_array($tournamentGroupStats) || is_object($tournamentGroupStats)) {

        foreach($tournamentGroupStats[0]->tournament_groups as $tournamentGroupStat) {
          $contador = 0;
          $tournament_group_id = $tournamentGroupStat->tournament_group_id;

          foreach($tournamentGroups as $tournamentGroup) {
            
            if ( ($tournamentGroup->legacy_id === $tournamentGroupStat->id) && ( $tournamentGroupStat->tournament_group_id === null) ) { // ($tournamentGroup->legacy_stat_request < $updated_at) ) {
              $contador = 1;

              DB::table('tournament_groups')
              ->where('legacy_id', $tournamentGroupStat->id)
              ->update([
                       'tournament_id'       => $tournament_id,
                       'name'                => $tournamentGroupStat->name,
                       'description'         => $tournamentGroupStat->description,
                       'legacy_stat_request' => $updated_at
                       ]);
          }

        }
        if ( ($contador == 0) && ($tournament_group_id == null) ) {

          $tournament_group                      =  new Tournament_group();
          $tournament_group->legacy_id           =  $tournamentGroupStat->id;
          $tournament_group->tournament_id       =  $tournament_id;
          $tournament_group->name                =  $tournamentGroupStat->name;
          $tournament_group->description         =  $tournamentGroupStat->description;
          $tournament_group->legacy_stat_request =  $updated_at;
          $tournament_group->save();
        }
      }
    }
  // }
  }


static $allTournamentGroups = '[
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
    "tournament_groups": [
        {
            "id": 1,
            "tournament_id": 1,
            "name": "Liga Americana",
            "description": "Liga Americana",
            "tournament_group_id": null,
            "tournament_phase_id": 1
        },
        {
            "id": 2,
            "tournament_id": 1,
            "name": "Liga Nacional",
            "description": "Liga Nacional",
            "tournament_group_id": null,
            "tournament_phase_id": 2
        },
        {
            "id": 3,
            "tournament_id": 1,
            "name": "Central",
            "description": "Grupo A",
            "tournament_group_id": 1,
            "tournament_phase_id": 1
        },
        {
            "id": 4,
            "tournament_id": 1,
            "name": "East",
            "description": "Grupo B",
            "tournament_group_id": 1,
            "tournament_phase_id": 1
        },
        {
            "id": 5,
            "tournament_id": 1,
            "name": "West",
            "description": "Grupo C",
            "tournament_group_id": 1,
            "tournament_phase_id": 1
        },
        {
            "id": 6,
            "tournament_id": 1,
            "name": "Central",
            "description": "Grupo A",
            "tournament_group_id": 2,
            "tournament_phase_id": 1
        },
        {
            "id": 7,
            "tournament_id": 1,
            "name": "East",
            "description": "Grupo B",
            "tournament_group_id": 2,
            "tournament_phase_id": 1
        },
        {
            "id": 8,
            "tournament_id": 1,
            "name": "West",
            "description": "Grupo C",
            "tournament_group_id": 2,
            "tournament_phase_id": 1
        }
    ]
  }
]';

}
