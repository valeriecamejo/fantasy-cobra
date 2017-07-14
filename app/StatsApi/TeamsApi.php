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

    $updated_at    = '2017-07-12 15:58:03';
    $teams     = DB::table('teams')->get();
    $teamStats = json_decode(self::$allTeams);

    if (is_array($teamStats) || is_object($teamStat)) {
      foreach($teamStats as $teamStat) {
      //  echo $stadium_id = $teamStat->stadium->{'id'};
        if ($teamStat->stadium_id == null) {
            $stadium_id = null;
        } else {
            $stadium_id = $teamStat->stadium->{'id'};
        }
        $contador = 0;
        foreach($teams as $team) {

          if ($team->legacy_id === $teamStat->id) { // ($position->legacy_stat_request > $updated_at) ) {
            $contador = 1;

            DB::table('teams')
            ->where('legacy_id', $teamStat->id)
            ->update([
                     'stadium_id'          => $stadium_id,
                     'name'                => $teamStat->name,
                     'nickname'            => $teamStat->nickname,
                     'president'           => $teamStat->president,
                     'coach'               => $teamStat->coach,
                     'history'             => $teamStat->history,
                     'legacy_stat_request' => $updated_at
                     ]);
        }
      }
      if ($contador == 0) {

        $team                      =  new Team();
        $team->legacy_id           =  $teamStat->id;
        $team->stadium_id          =  $stadium_id;
        $team->name                =  $teamStat->name;
        $team->nickname            =  $teamStat->nickname;
        $team->president           =  $teamStat->president;
        $team->coach               =  $teamStat->coach;
        $team->history             =  $teamStat->history;
        $team->legacy_stat_request =  $updated_at;
        $team->save();
      }
    }
  }
}


static $allTeams = '[
    {
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
    {
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
    {
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
    },
    {
        "id": 4,
        "city_id": 1,
        "stadium_id": 1,
        "name": "Leones del Caracas",
        "nickname": "LEO",
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
    {
        "id": 5,
        "city_id": 1,
        "stadium_id": 1,
        "name": "Barcelona FC",
        "nickname": "BARCA",
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
    {
        "id": 6,
        "city_id": 1,
        "stadium_id": 1,
        "name": "Atlético Madrid",
        "nickname": "ATLM",
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
    {
        "id": 7,
        "city_id": 1,
        "stadium_id": 1,
        "name": "Juventus",
        "nickname": "Juve",
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
    {
        "id": 8,
        "city_id": 1,
        "stadium_id": 1,
        "name": "Monaco FC",
        "nickname": "M",
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
    {
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
    {
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
    {
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
    {
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
    {
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
    {
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
    {
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
    {
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
    {
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
    },
    {
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
    {
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
    {
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
    },
    {
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
    {
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
    },
    {
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
    },
    {
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
    {
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
    {
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
    {
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
    {
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
    },
    {
        "id": 29,
        "city_id": null,
        "stadium_id": null,
        "name": "América",
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
    {
        "id": 30,
        "city_id": null,
        "stadium_id": null,
        "name": "Atlas",
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
    {
        "id": 31,
        "city_id": null,
        "stadium_id": null,
        "name": "Cruz Azul",
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
    {
        "id": 32,
        "city_id": null,
        "stadium_id": null,
        "name": "Guadalajara",
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
    {
        "id": 33,
        "city_id": null,
        "stadium_id": null,
        "name": "León",
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
    {
        "id": 34,
        "city_id": null,
        "stadium_id": null,
        "name": "Lobos BUAP",
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
    {
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
    {
        "id": 36,
        "city_id": null,
        "stadium_id": null,
        "name": "Morelia",
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
    {
        "id": 37,
        "city_id": null,
        "stadium_id": null,
        "name": "Necaxa",
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
    {
        "id": 38,
        "city_id": null,
        "stadium_id": null,
        "name": "Pachuca",
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
    {
        "id": 39,
        "city_id": null,
        "stadium_id": null,
        "name": "Puebla",
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
    {
        "id": 40,
        "city_id": null,
        "stadium_id": null,
        "name": "Pumas UNAM",
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
    {
        "id": 41,
        "city_id": null,
        "stadium_id": null,
        "name": "Querétaro",
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
    {
        "id": 42,
        "city_id": null,
        "stadium_id": null,
        "name": "Santos Laguna",
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
    {
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
    },
    {
        "id": 44,
        "city_id": null,
        "stadium_id": null,
        "name": "Tijuana",
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
    {
        "id": 45,
        "city_id": null,
        "stadium_id": null,
        "name": "Toluca",
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
    {
        "id": 46,
        "city_id": null,
        "stadium_id": null,
        "name": "Veracruz",
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
]';

}
