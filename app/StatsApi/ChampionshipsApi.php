<?php

namespace App\StatsApi;

use DB;
use App\Championship;

class ChampionshipsApi extends StatsApi {

/**************************************************
* saveUpdateChampionships: Save or update championships
* @param $sport_id
* @return void
**************************************************/

public static function saveUpdateChampionships () {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//***********************************************************

/**************************************************************
//CODIGO PARA LA SOLICITUD DEL SERVICIO CHAMPIONSHIP AL API
// $service = 'championships';
// $params  = StatsApi::login();
// jsonApi  = StatsApi::service($service, $params);
// $stats   = json_decode($jsonApi);
*///***********************************************************

    $updated_at        = '2017-07-12 15:58:03';
    $championships     = DB::table('championships')->get();
    $championshipStats = json_decode(self::$allChampionships);

    if (is_array($championshipStats) || is_object($championshipStats)) {
      foreach($championshipStats[0]->championships as $championshipStat) {
        $contador = 0;
        foreach($championships as $championship) {

          if ($championship->legacy_id === $championshipStat->id) { // ($championship->legacy_stat_request < $updated_at) ) {
            $contador = 1;

            DB::table('championships')
            ->where('legacy_id', $championshipStat->id)
            ->update([
               'sport_id'            => $championshipStat->sport_id,
               'name'                => $championshipStat->name,
               'description'         => $championshipStat->description,
               'is_active'           => $championshipStat->is_active,
               'legacy_stat_request' => $updated_at
               ]);
        }
    }
    if ($contador == 0) {

        $championship                      =  new Championship();
        $championship->legacy_id           =  $championshipStat->id;
        $championship->sport_id            =  $championshipStat->sport_id;
        $championship->name                =  $championshipStat->name;
        $championship->description         =  $championshipStat->description;
        $championship->is_active           =  $championshipStat->is_active;
        $championship->legacy_stat_request =  $updated_at;
        $championship->save();
        echo $championship;
    }
}
}
}


static $allChampionships = '[
{
    "id": 1,
    "name": "Baseball",
    "description": "Baseball",
    "icon_updated_at": null,
    "icon_file_size": null,
    "icon_content_type": null,
    "icon_file_name": null,
    "championships": [
    {
        "id": 1,
        "sport_id": 1,
        "name": "MLB",
        "description": "Major League Baseball",
        "icon_updated_at": null,
        "icon_file_size": null,
        "icon_content_type": null,
        "icon_file_name": null,
        "is_active": false
    },
    {
        "id": 2,
        "sport_id": 1,
        "name": "LVBP",
        "description": "Liga Venezolana de Beisbol Profesional",
        "icon_updated_at": null,
        "icon_file_size": null,
        "icon_content_type": null,
        "icon_file_name": null,
        "is_active": false
    },
    {
        "id": 3,
        "sport_id": 2,
        "name": "La Liga",
        "description": "Liga Española",
        "icon_updated_at": null,
        "icon_file_size": null,
        "icon_content_type": null,
        "icon_file_name": null,
        "is_active": false
    },
    {
        "id": 4,
        "sport_id": 2,
        "name": "UCL",
        "description": "UEFA Champions League",
        "icon_updated_at": null,
        "icon_file_size": null,
        "icon_content_type": null,
        "icon_file_name": null,
        "is_active": false
    },
    {
        "id": 5,
        "sport_id": 2,
        "name": "Liga MX",
        "description": "Liga de Mexico",
        "icon_updated_at": null,
        "icon_file_size": null,
        "icon_content_type": null,
        "icon_file_name": null,
        "is_active": true
    }
    ]
}
]';

}
