<?php

namespace App\StatsApi;

use DB;
use App\Sport;

class SportsApi extends StatsApi {

  static $endpoint = 'sports';

  static function getAll() {

    parent::login();
    print_r(parent::$params);
    $sports = parent::clientHttp()->get(parent::$base_url . self::$endpoint, ['headers' => parent::$params]);

    return $sports;
  }

/**************************************************
* saveUpdateSports: Save or update Sports
* @param void
* @return void
**************************************************/

    public static function saveUpdateSports () {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//***********************************************************

    $updated_at = '2017-07-12 15:58:03';
    $sports     = DB::table('sports')->get();
    $sportStats = json_decode(self::$allSports);

    if (is_array($sportStats) || is_object($sportStats)) {
      foreach($sportStats as $sportStat) {
        $contador = 0;

        foreach($sports as $sport) {

          if ($sport->legacy_id == $sportStat->id) { // ($sport->legacy_stat_request > $updated_at) ) {
            $contador = 1;

            DB::table('sports')
            ->where('legacy_id', $sportStat->id)
            ->update([
                     'name'                => $sportStat->name,
                     'description'         => $sportStat->description,
                     'legacy_stat_request' => $updated_at
                     ]);
        }
      }
      if ($contador == 0) {

        $sport                      =  new Sport();
        $sport->legacy_id           =  $sportStat->id;
        $sport->name                =  $sportStat->name;
        $sport->description         =  $sportStat->description;
        $sport->legacy_stat_request =  $updated_at;
        $sport->save();
      }
    }
  }
}


static $allSports = '[
    {
        "id": 1,
        "name": "Baseball",
        "description": "Baseball",
        "icon_updated_at": null,
        "icon_file_size": null,
        "icon_content_type": null,
        "icon_file_name": null
    },
    {
        "id": 2,
        "name": "Futbol",
        "description": "correr detras de un balon",
        "icon_updated_at": null,
        "icon_file_size": null,
        "icon_content_type": null,
        "icon_file_name": null
    }
]';

}

