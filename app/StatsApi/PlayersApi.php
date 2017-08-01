<?php

namespace App\StatsApi;

Use DB;
Use App\Player;
Use App\Position;

class PlayersApi extends StatsApi {

/********************************************
* saveUpdatePlayers: Save or Update a player
* @param void
* @return void
********************************************/

public static function saveUpdatePlayers ($championship_id) {

  //TO DO
  //****************************************
  //Sustituir '$update_at' por el del API
  //Sustituir championship_id
  //Solicitar para la consulta:
  //   -Status del player
  //****************************************

  //$championships = championship::where('is_active', 1)->get();

  // foreach($championships as $championship) {
  //   echo $championship['legacy_id'];

  // $service = 'players/$championship['id']/tournaments/stats';
  // $params  = StatsApi::login();
  // StatsApi::service($service, $params);
  // $stats   = json_decode($statsApi);


  $championship_id = 1;
  $updated_at      = '2017-07-12 15:58:03';

  $players     = DB::table('players')->where('championship_id', '=', $championship_id)->get();
  $playerStats = json_decode(self::$allPlayers);

  if (is_array($playerStats) || is_object($playerStats)) {

    foreach($playerStats as $playerStat) {
      $position = Position::select('name')->where('legacy_id', $playerStat->position_id)->get();
      $contador = 0;

      foreach($players as $player) {
          if ($player->legacy_id == $playerStat->id) { //&& ($player->legacy_stat_request < $updated_at) ) {
            $contador = 1;
            $position = Position::select('name')->where('legacy_id', $playerStat->position_id)->get();

            DB::table('players')
            ->where('legacy_id', $playerStat->id)
            ->update([
             'team_id'             => $playerStat->team_id,
             'championship_id'     => $championship_id,
             'name'                => $playerStat->name,
             'last_name'           => $playerStat->last_name,
             'position'            => $position[0]->name,
             'legacy_stat_request' => $updated_at
             ]);
          }
        }
        if ($contador == 0) {

          $player                      =  new Player();
          $player->team_id             =  $playerStat->team_id;
          $player->championship_id     =  $championship_id;
          $player->legacy_id           =  $playerStat->id;
          $player->name                =  $playerStat->name;
          $player->last_name           =  $playerStat->last_name;
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

  static $allPlayers = '[
  {
    "id": 1,
    "name": "Rafael",
    "last_name": "Marcano",
    "country_id": 1,
    "team_id": 2,
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
  },
  {
    "id": 2,
    "name": "Carlos",
    "last_name": "Sanchez",
    "country_id": 1,
    "team_id": 2,
    "position_id": 2,
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
  },
  {
    "id": 3,
    "name": "Raul",
    "last_name": "Zambrano",
    "country_id": 1,
    "team_id": 2,
    "position_id": 3,
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
  },
  {
    "id": 4,
    "name": "Jose",
    "last_name": "Morales",
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
  },
  {
    "id": 5,
    "name": "Brayan",
    "last_name": "Zambrano",
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
  },
  {
    "id": 6,
    "name": "Esposito",
    "last_name": "Espinoza",
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
  },
  {
    "id": 7,
    "name": "Julio",
    "last_name": "Perez",
    "country_id": 1,
    "team_id": 2,
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
  },
  {
    "id": 8,
    "name": "Adrian",
    "last_name": "Diaz",
    "country_id": 1,
    "team_id": 2,
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
  },
  {
    "id": 9,
    "name": "Anthuan",
    "last_name": "Garcia",
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
  },
  {
    "id": 10,
    "name": "Jorge",
    "last_name": "Salcedo",
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
  },
  {
    "id": 11,
    "name": "Saul",
    "last_name": "Solorzano",
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
  },
  {
    "id": 12,
    "name": "Michael",
    "last_name": "Camejo",
    "country_id": 1,
    "team_id": 2,
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
  },
  {
    "id": 13,
    "name": "Fabian",
    "last_name": "Florez",
    "country_id": 1,
    "team_id": 2,
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
  },
  {
    "id": 14,
    "name": "Pedro",
    "last_name": "Villoria",
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
  },
  {
    "id": 15,
    "name": "Daniel",
    "last_name": "Jimenez",
    "country_id": 1,
    "team_id": 2,
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
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
  },
  {
    "id": 28,
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
  ]';

}

