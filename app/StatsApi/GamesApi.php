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

/**************************************************************
//CODIGO PARA SOLICITAR LOS TOURNAMENT_GROUP POR TOURNAMENT_ID
//
// $tournaments = tournament::where('is_active', true)->get();
//
  // foreach($tournaments as $tournament) {

    // $tournament_legacy_id = $tournament['legacy_id'];
    // $service = 'tournaments/$tournament_legacy_id/games';
    // $params  = StatsApi::login();
    // jsonApi  = StatsApi::service($service, $params);
    // $stats   = json_decode($jsonApi);
*///***********************************************************

    $updated  = date("Y-m-d H:i:s e");
    $games     = DB::table('games')->where('tournament_id', 1)->get();
    $gameStatsApis = json_decode(self::$allGames);

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
// }
}


static $allGames = '[
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
            "tournament_phase_id": 1,
            "games": [
                {
                    "id": 1,
                    "tournament_id": 1,
                    "tournament_group_id": 1,
                    "team_home_id": 2,
                    "team_away_id": 3,
                    "start_date": "2016-12-01T00:00:00.000Z",
                    "end_date": "2016-12-01T00:00:00.000Z",
                    "score_home": 6,
                    "score_away": 1,
                    "status": "pending",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 1\"}",
                    "mvp": null,
                    "outstanding": true,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
                        "id": 3,
                        "city_id": 1,
                        "stadium_id": 1,
                        "name": "Tigres de Aragua",
                        "nickname": "TIG",
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
                    "tournament_group_id": 1,
                    "team_home_id": 2,
                    "team_away_id": 3,
                    "start_date": "2016-12-04T00:00:00.000Z",
                    "end_date": "2016-12-04T00:00:00.000Z",
                    "score_home": 4,
                    "score_away": 10,
                    "status": "finished",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 1\"}",
                    "mvp": null,
                    "outstanding": true,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
                        "id": 3,
                        "city_id": 1,
                        "stadium_id": 1,
                        "name": "Tigres de Aragua",
                        "nickname": "TIG",
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
                    "id": 3,
                    "tournament_id": 1,
                    "tournament_group_id": 1,
                    "team_home_id": 2,
                    "team_away_id": 3,
                    "start_date": "2017-03-07T00:00:00.000Z",
                    "end_date": "2017-03-07T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "in_process",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": true,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
                        "id": 3,
                        "city_id": 1,
                        "stadium_id": 1,
                        "name": "Tigres de Aragua",
                        "nickname": "TIG",
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
                    "id": 4,
                    "tournament_id": 1,
                    "tournament_group_id": 1,
                    "team_home_id": 2,
                    "team_away_id": 3,
                    "start_date": "2017-03-07T00:00:00.000Z",
                    "end_date": "2017-03-07T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "finished",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": true,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
                        "id": 3,
                        "city_id": 1,
                        "stadium_id": 1,
                        "name": "Tigres de Aragua",
                        "nickname": "TIG",
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
                    "id": 5,
                    "tournament_id": 2,
                    "tournament_group_id": 1,
                    "team_home_id": 1,
                    "team_away_id": 2,
                    "start_date": "2016-12-01T00:00:00.000Z",
                    "end_date": "2016-12-01T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "in_process",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": true,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                },
                {
                    "id": 6,
                    "tournament_id": 2,
                    "tournament_group_id": 1,
                    "team_home_id": 1,
                    "team_away_id": 2,
                    "start_date": "2016-12-01T00:00:00.000Z",
                    "end_date": "2016-12-01T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "in_process",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}\"Players\": \"Player 1\"",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": true,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                },
                {
                    "id": 7,
                    "tournament_id": 3,
                    "tournament_group_id": 1,
                    "team_home_id": 2,
                    "team_away_id": 3,
                    "start_date": "2017-03-10T00:00:00.000Z",
                    "end_date": "2017-03-10T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "in_process",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": null,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
                        "id": 3,
                        "city_id": 1,
                        "stadium_id": 1,
                        "name": "Tigres de Aragua",
                        "nickname": "TIG",
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
                    "id": 8,
                    "tournament_id": 4,
                    "tournament_group_id": 1,
                    "team_home_id": 1,
                    "team_away_id": 2,
                    "start_date": "2017-03-15T00:00:00.000Z",
                    "end_date": "2017-03-15T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "deferred",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": null,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                },
                {
                    "id": 9,
                    "tournament_id": 2,
                    "tournament_group_id": 1,
                    "team_home_id": 1,
                    "team_away_id": 2,
                    "start_date": "2017-03-09T00:00:00.000Z",
                    "end_date": "2017-03-09T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "deferred",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": null,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                },
                {
                    "id": 10,
                    "tournament_id": 3,
                    "tournament_group_id": 1,
                    "team_home_id": 2,
                    "team_away_id": 3,
                    "start_date": "2016-12-01T00:00:00.000Z",
                    "end_date": "2016-12-01T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "deferred",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": true,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
                        "id": 3,
                        "city_id": 1,
                        "stadium_id": 1,
                        "name": "Tigres de Aragua",
                        "nickname": "TIG",
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
                    "id": 11,
                    "tournament_id": 4,
                    "tournament_group_id": 1,
                    "team_home_id": 1,
                    "team_away_id": 2,
                    "start_date": "2016-12-01T00:00:00.000Z",
                    "end_date": "2016-12-01T00:00:00.000Z",
                    "score_home": 1,
                    "score_away": 1,
                    "status": "finished",
                    "referee_id": null,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": null,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                },
                {
                    "id": 12,
                    "tournament_id": 1,
                    "tournament_group_id": 1,
                    "team_home_id": 1,
                    "team_away_id": 2,
                    "start_date": null,
                    "end_date": null,
                    "score_home": 10,
                    "score_away": 23,
                    "status": "in_process",
                    "referee_id": 1,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": null,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                },
                {
                    "id": 13,
                    "tournament_id": 1,
                    "tournament_group_id": 1,
                    "team_home_id": 1,
                    "team_away_id": 2,
                    "start_date": null,
                    "end_date": null,
                    "score_home": 11,
                    "score_away": 13,
                    "status": "finished",
                    "referee_id": 2,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": null,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                },
                {
                    "id": 14,
                    "tournament_id": 2,
                    "tournament_group_id": 1,
                    "team_home_id": 2,
                    "team_away_id": 1,
                    "start_date": null,
                    "end_date": null,
                    "score_home": 15,
                    "score_away": 6,
                    "status": "deferred",
                    "referee_id": 3,
                    "schema_team_home": "{\"players\": \"Player 1\"}",
                    "schema_team_away": "{\"players\": \"Player 2\"}",
                    "mvp": null,
                    "outstanding": null,
                    "broadcast_on": null,
                    "round": null,
                    "team_home": {
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
                    },
                    "team_away": {
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
                }
            ]
        },
        {
            "id": 2,
            "tournament_id": 1,
            "name": "Liga Nacional",
            "description": "Liga Nacional",
            "tournament_group_id": null,
            "tournament_phase_id": 2,
            "games": []
        },
        {
            "id": 3,
            "tournament_id": 1,
            "name": "Central",
            "description": "Grupo A",
            "tournament_group_id": 1,
            "tournament_phase_id": 1,
            "games": []
        },
        {
            "id": 4,
            "tournament_id": 1,
            "name": "East",
            "description": "Grupo B",
            "tournament_group_id": 1,
            "tournament_phase_id": 1,
            "games": []
        },
        {
            "id": 5,
            "tournament_id": 1,
            "name": "West",
            "description": "Grupo C",
            "tournament_group_id": 1,
            "tournament_phase_id": 1,
            "games": []
        },
        {
            "id": 6,
            "tournament_id": 1,
            "name": "Central",
            "description": "Grupo A",
            "tournament_group_id": 2,
            "tournament_phase_id": 1,
            "games": []
        },
        {
            "id": 7,
            "tournament_id": 1,
            "name": "East",
            "description": "Grupo B",
            "tournament_group_id": 2,
            "tournament_phase_id": 1,
            "games": []
        },
        {
            "id": 8,
            "tournament_id": 1,
            "name": "West",
            "description": "Grupo C",
            "tournament_group_id": 2,
            "tournament_phase_id": 1,
            "games": []
        }
    ]
}
]';

}
