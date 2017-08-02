<?php

namespace App\StatsApi;

use DB;
use App\Game;
use DateTime;


class GamesApi extends StatsApi {

/**************************************************
* saveUpdateGames: Save or update games
* @param $star_date, $end_date
* @return void
**************************************************/

public static function saveUpdateGames ($star_date, $end_date) {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//***********************************************************

    $updated  = date("Y-m-d H:i:s e");
    $games     = DB::table('games')->whereBetween('start_date', [$star_date, $end_date])->get();
    $gameStats = json_decode(self::$allGames);

    if (is_array($gameStats) || is_object($gameStats)) {
      foreach($gameStats[0]->stat as $gameStat) {

        $contador          = 0;
        $start_date        = new DateTime($gameStat->game->{"start_date"});
        $end_date          = new DateTime($gameStat->game->{"end_date"});
        $updated_at        = new DateTime($updated);
        foreach($games as $game) {
          if ( $gameStat->game->{"id"} === $game->legacy_id ) { // && ($game->legacy_stat_request < $updated_at){
            
            $contador = 1;

            DB::table('games')
            ->where('legacy_id', $gameStat->game->{"id"})
            ->update([
               'tournament_id'       => $gameStat->game->{"tournament_id"},
               'tournament_group_id' => $gameStat->game->{"tournament_group_id"},
               'team_id_home'        => $gameStat->game->team_home->{"id"},
               'team_id_away'        => $gameStat->game->team_away->{"id"},
               'start_date'          => $start_date,
               'end_date'            => $end_date,
               'score_home'          => $gameStat->game->{"score_home"},
               'score_away'          => $gameStat->game->{"score_away"},
               'status'              => $gameStat->game->{"status"},
               'schema_team_home'    => $gameStat->game->{"schema_team_home"},
               'schema_team_away'    => $gameStat->game->{"schema_team_away"},
               'mvp'                 => $gameStat->game->{"mvp"},
               'legacy_stat_request' => $updated_at
               ]);
        }
    }
      if ($contador == 0) {

        $game                      = new Game();
        $game->legacy_id           = $gameStat->game->{"id"};
        $game->tournament_id       = $gameStat->game->{"tournament_id"};
        $game->tournament_group_id = $gameStat->game->{"tournament_group_id"};
        $game->team_id_home        = $gameStat->game->team_home->{"id"};
        $game->team_id_away        = $gameStat->game->team_away->{"id"};
        $game->start_date          = $start_date;
        $game->end_date            = $end_date;
        $game->score_home          = $gameStat->game->{"score_home"};
        $game->score_away          = $gameStat->game->{"score_away"};
        $game->status              = $gameStat->game->{"status"};
        $game->schema_team_home    = $gameStat->game->{"schema_team_home"};
        $game->schema_team_away    = $gameStat->game->{"schema_team_away"};
        $game->mvp                 = $gameStat->game->{"mvp"};
        $game->legacy_stat_request = $updated_at;
        $game->save();

        return $game;
      }
    }
  }
}


static $allGames = '[
{
    "tournament": {
        "id": 8,
        "name": "La Liga 2017-2017"
    },
    "stat": [
        {
            "game": {
                "id": 1,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 11,
                "team_away_id": 9,
                "start_date": "2017-08-21T20:15:00.000Z",
                "end_date": null,
                "score_home": 1,
                "score_away": 1,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 1,
                "team_home": {
                    "id": 11,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Atl. Madrid",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                },
                "team_away": {
                    "id": 9,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Alaves",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                }
            }
        },
        {
            "game": {
                "id": 18,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 12,
                "team_away_id": 13,
                "start_date": "2017-08-20T16:15:00.000Z",
                "end_date": null,
                "score_home": 6,
                "score_away": 2,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 1,
                "team_home": {
                    "id": 12,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Barcellona",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                },
                "team_away": {
                    "id": 13,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Betis Balompie",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                }
            }
        },
        {
            "game": {
                "id": 19,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 14,
                "team_away_id": 20,
                "start_date": "2017-08-21T20:15:00.000Z",
                "end_date": null,
                "score_home": 1,
                "score_away": 1,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 1,
                "team_home": {
                    "id": 14,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Celta Vigo",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                },
                "team_away": {
                    "id": 20,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Leganes",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                }
            }
        },
        {
            "game": {
                "id": 20,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 15,
                "team_away_id": 16,
                "start_date": "2017-08-19T20:00:00.000Z",
                "end_date": null,
                "score_home": 2,
                "score_away": 1,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 1,
                "team_home": {
                    "id": 15,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Deportivo",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                },
                "team_away": {
                    "id": 16,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Eibar",
                    "nickname": null,
                    "logo": "/icons/original/missing.png",
                    "president": null,
                    "coach": null,
                    "history": null,
                    "logo_file_name": null,
                    "logo_content_type": null,
                    "logo_file_size": null,
                    "logo_updated_at": null
                }
            }
        }
    ],
    "last_date": {
        "id": 545,
        "tournament_id": 8,
        "tournament_group_id": null,
        "team_home_id": 35,
        "team_away_id": 43,
        "start_date": "2017-11-18T18:00:00.000Z",
        "end_date": null,
        "score_home": 0,
        "score_away": 0,
        "status": "pending",
        "referee_id": null,
        "schema_team_home": null,
        "schema_team_away": null,
        "mvp": null,
        "outstanding": true,
        "broadcast_on": null,
        "round": 1,
        "team_home": {
            "id": 35,
            "city_id": null,
            "stadium_id": null,
            "name": "Monterrey",
            "nickname": null,
            "logo": "/icons/original/missing.png",
            "president": null,
            "coach": null,
            "history": null,
            "logo_file_name": null,
            "logo_content_type": null,
            "logo_file_size": null,
            "logo_updated_at": null
        },
        "team_away": {
            "id": 43,
            "city_id": null,
            "stadium_id": null,
            "name": "Tigres UANL",
            "nickname": null,
            "logo": "/icons/original/missing.png",
            "president": null,
            "coach": null,
            "history": null,
            "logo_file_name": null,
            "logo_content_type": null,
            "logo_file_size": null,
            "logo_updated_at": null
        }
    }
}
]';

}
