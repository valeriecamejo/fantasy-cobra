<?php

namespace App\StatsApi;

use DB;
use App\Game;

class GamesApi extends StatsApi {

/**************************************************
* saveUpdateGames: Save or update games
* @param $star_date, $end_date
* @return void
**************************************************/

  public static function saveUpdateGames ($star_date, $end_date) {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//Modificar las fechas start_date y end_date con TimeZone
//***********************************************************

    $updated_at    = '2017-07-12 15:58:03';
    $games     = DB::table('games')->whereBetween('start_date', [$star_date, $end_date])->get();
    $gameStats = json_decode(self::$allGames);

    if (is_array($gameStats) || is_object($gameStats)) {
      foreach($gameStats[0]->stat as $gameStat) {
        $contador = 0;
        foreach($games as $game) {
          if ($game->legacy_id == $gameStat->game->id) { // ($position->legacy_stat_request > $updated_at) ) {
            $contador = 1;
            DB::table('games')
            ->where('legacy_id', $gameStat->game->{"id"})
            ->update([
                     'tournament_id'       => $gameStat->game->{"tournament_id"},
                     'tournament_group_id' => $gameStat->game->{"tournament_group_id"},
                     'team_id_home'        => $gameStat->game->team_home->{"id"},
                     'team_id_away'        => $gameStat->game->team_away->{"id"},
                     'start_date'          => $gameStat->game->{"start_date"},
                     'end_date'            => $gameStat->game->{"end_date"},
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
          $game->start_date          = $gameStat->game->{"start_date"};
          $game->end_date            = $gameStat->game->{"end_date"};
          $game->score_home          = $gameStat->game->{"score_home"};
          $game->score_away          = $gameStat->game->{"score_away"};
          $game->status              = $gameStat->game->{"status"};
          $game->schema_team_home    = $gameStat->game->{"schema_team_home"};
          $game->schema_team_away    = $gameStat->game->{"schema_team_away"};
          $game->mvp                 = $gameStat->game->{"mvp"};
          $game->legacy_stat_request = $updated_at;
          $game->save();
        }
      }
    }
  }


static $allGames = '[
    {
    "tournament": {
        "id": 8,
        "name": "La Liga 2016-2017"
    },
    "stat": [
        {
            "game": {
                "id": 1,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 11,
                "team_away_id": 9,
                "start_date": "2017-07-30",
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
                "start_date": "2017-07-30",
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
                "start_date": "2017-07-30",
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
                "start_date": "2017-07-30",
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
        },
        {
            "game": {
                "id": 21,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 18,
                "team_away_id": 28,
                "start_date": "2017-07-30",
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
                    "id": 18,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Granada",
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
                    "id": 28,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Villarreal",
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
                "id": 22,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 21,
                "team_away_id": 22,
                "start_date": "2017-07-30",
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
                    "id": 21,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Malaga",
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
                    "id": 22,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Osasuna",
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
                "id": 23,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 24,
                "team_away_id": 23,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 0,
                "score_away": 3,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 1,
                "team_home": {
                    "id": 24,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Real Sociedad",
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
                    "id": 23,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Real Madrid",
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
                "id": 24,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 25,
                "team_away_id": 17,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 6,
                "score_away": 4,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 1,
                "team_home": {
                    "id": 25,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Siviglia",
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
                    "id": 17,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Espanyol",
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
                "id": 25,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 26,
                "team_away_id": 10,
                "start_date": "2017-07-30",
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
                    "id": 26,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Sporting Gijón",
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
                    "id": 10,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Athletic",
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
                "id": 26,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 27,
                "team_away_id": 19,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 2,
                "score_away": 4,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 1,
                "team_home": {
                    "id": 27,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Valencia",
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
                    "id": 19,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Las Palmas",
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
                "id": 27,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 9,
                "team_away_id": 26,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 0,
                "score_away": 0,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 2,
                "team_home": {
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
                },
                "team_away": {
                    "id": 26,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Sporting Gijón",
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
                "id": 28,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 10,
                "team_away_id": 12,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 0,
                "score_away": 1,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 2,
                "team_home": {
                    "id": 10,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Athletic",
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
                }
            }
        },
        {
            "game": {
                "id": 29,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 13,
                "team_away_id": 15,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 0,
                "score_away": 0,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 2,
                "team_home": {
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
                },
                "team_away": {
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
                }
            }
        },
        {
            "game": {
                "id": 30,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 16,
                "team_away_id": 27,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 1,
                "score_away": 0,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 2,
                "team_home": {
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
                },
                "team_away": {
                    "id": 27,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Valencia",
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
                "id": 114,
                "tournament_id": 8,
                "tournament_group_id": null,
                "team_home_id": 19,
                "team_away_id": 14,
                "start_date": "2017-07-30",
                "end_date": null,
                "score_home": 3,
                "score_away": 3,
                "status": "finished",
                "referee_id": null,
                "schema_team_home": null,
                "schema_team_away": null,
                "mvp": null,
                "outstanding": true,
                "broadcast_on": null,
                "round": 10,
                "team_home": {
                    "id": 19,
                    "city_id": null,
                    "stadium_id": null,
                    "name": "Las Palmas",
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
                }
            }
        }
    ]
  }
]';

}
