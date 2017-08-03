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

  $tournaments = tournament::where('is_active', true)->get();

    foreach($tournaments as $tournament) {

      $tournament_legacy_id = $tournament['legacy_id'];
      $service              = 'tournaments/'. $tournament_legacy_id. '/players';
      $jsonApi              = StatsApi::get($service);
      $stats                = json_decode($jsonApi);
      $updated_at           = '2017-07-12 15:58:03';
      $players              = DB::table('players')->get();
      $playerStatsApis      = json_decode(self::$allPlayers);

      if (is_array($playerStatsApis) || is_object($playerStatsApis)) {


        foreach( $playerStatsApis[0]->tournament_teams as $playerStatsApi ) {
          foreach( $playerStatsApi->player_tournament_teams as $playerStat ) {

            $position = Position::select('name')->where('legacy_id', $playerStat->player->{"position_id"})->get();
            $contador = 0;

            foreach( $players as $player ) {
              if ( $player->legacy_id == $playerStat->player->{"id"} ) { //&& ($player->legacy_stat_request < $updated_at) ) {
                  $contador = 1;
                  $position = Position::select('name')->where('legacy_id', $playerStat->player->{"position_id"})->get();

                  DB::table('players')
                  ->where( 'legacy_id', $playerStat->player->{"id"} )
                  ->update([
                   'team_id'             => $playerStat->player->{"team_id"},
                   'championship_id'     => $playerStatsApis[0]->championship_id,
                   'name'                => $playerStat->player->{"name"},
                   'last_name'           => $playerStat->player->{"last_name"},
                   'position'            => $position[0]->name,
                   'legacy_stat_request' => $updated_at
                   ]);
                }
            }
              if ($contador == 0) {

                $player                      =  new Player();
                $player->team_id             =  $playerStat->player->{"team_id"};
                $player->championship_id     =  $playerStatsApis[0]->championship_id;
                $player->legacy_id           =  $playerStat->player->{"id"};
                $player->name                =  $playerStat->player->{"name"};
                $player->last_name           =  $playerStat->player->{"last_name"};
                $player->points              =  0;
                $player->position            =  $position[0]->name;
                $player->status              =  1;
                $player->legacy_stat_request =  $updated_at;
                $player->save();
              }
          }
        }
      }
    }
  }

  static $allPlayers = '[
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
      "player_tournament_teams": [
      {
        "player_id": 16,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 16,
          "name": "Juan",
          "last_name": "Perez",
          "country_id": 1,
          "team_id": 3,
          "position_id": 1,
          "sport_id": 1,
          "weight": 98,
          "height": 1.95,
          "birth_date": null,
          "birth_place": "Caracas",
          "left_handedness": null,
          "right_handedness": null,
          "left_footedness": null,
          "right_footedness": null,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 17,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 17,
          "name": "Jorge",
          "last_name": "Manrique",
          "country_id": 1,
          "team_id": 2,
          "position_id": 1,
          "sport_id": 1,
          "weight": 98,
          "height": 1.95,
          "birth_date": null,
          "birth_place": "Barquisimeto",
          "left_handedness": null,
          "right_handedness": null,
          "left_footedness": null,
          "right_footedness": null,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 18,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 18,
          "name": "Christian",
          "last_name": "Ramos",
          "country_id": 1,
          "team_id": 3,
          "position_id": 1,
          "sport_id": 1,
          "weight": 98,
          "height": 1.95,
          "birth_date": null,
          "birth_place": "Valencia",
          "left_handedness": null,
          "right_handedness": null,
          "left_footedness": null,
          "right_footedness": null,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 19,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 19,
          "name": "Nelson",
          "last_name": "Legonia",
          "country_id": 1,
          "team_id": 3,
          "position_id": 1,
          "sport_id": 1,
          "weight": 98,
          "height": 1.95,
          "birth_date": null,
          "birth_place": "Maracaibo",
          "left_handedness": null,
          "right_handedness": null,
          "left_footedness": null,
          "right_footedness": null,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 20,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 20,
          "name": "sebastian",
          "last_name": "abreu",
          "country_id": 1,
          "team_id": 2,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 21,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 21,
          "name": "alberto",
          "last_name": "gonzalez",
          "country_id": 1,
          "team_id": 2,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 22,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 22,
          "name": "antonio",
          "last_name": "martinez",
          "country_id": 1,
          "team_id": 2,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 23,
        "tournament_team_id": 1,
        "is_active": true,
        "player": {
          "id": 23,
          "name": "lucas",
          "last_name": "santana",
          "country_id": 1,
          "team_id": 2,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      }
      ]
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
      "player_tournament_teams": [
      {
        "player_id": 24,
        "tournament_team_id": 2,
        "is_active": true,
        "player": {
          "id": 24,
          "name": "sebastian",
          "last_name": "abreu",
          "country_id": 1,
          "team_id": 1,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 25,
        "tournament_team_id": 2,
        "is_active": true,
        "player": {
          "id": 25,
          "name": "alberto",
          "last_name": "gonzalez",
          "country_id": 1,
          "team_id": 1,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 26,
        "tournament_team_id": 2,
        "is_active": true,
        "player": {
          "id": 26,
          "name": "antonio",
          "last_name": "martinez",
          "country_id": 1,
          "team_id": 1,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      },
      {
        "player_id": 27,
        "tournament_team_id": 2,
        "is_active": true,
        "player": {
          "id": 27,
          "name": "lucas",
          "last_name": "santana",
          "country_id": 1,
          "team_id": 1,
          "position_id": 1,
          "sport_id": 1,
          "weight": 90,
          "height": 1.9,
          "birth_date": "1970-02-09T00:00:00.000Z",
          "birth_place": "Caracas",
          "left_handedness": false,
          "right_handedness": true,
          "left_footedness": false,
          "right_footedness": true,
          "avatar": "/system/uploads/icons/original/missing_players.jpeg",
          "avatar_file_name": null,
          "avatar_content_type": null,
          "avatar_file_size": null,
          "avatar_updated_at": null
        }
      }
      ]
    }
    ]
  }
  ]';

}

