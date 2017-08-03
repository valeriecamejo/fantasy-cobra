<?php

namespace App\StatsApi;

use DB;
use App\Sport;
use App\Position;

class PositionsApi extends StatsApi {

/**************************************************
* saveUpdatePositions: Save or update positions
* @param void
* @return void
**************************************************/

  public static function saveUpdatePositions () {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//***********************************************************

  $sports = sport::where('is_active', true)->get();

    foreach($sports as $sport) {

      $sport_legacy_id = $sport['legacy_id'];
      $service         = 'sports/' . $sport_legacy_id . '/positions';
      $jsonApi         = StatsApi::get($service);
      $positionStats   = json_encode($jsonApi);
      $updated_at      = '2017-07-12 15:58:03';
      $positions       = DB::table('positions')->get();
      // $positionStats = json_decode(self::$allPositions);

      if (is_array($positionStats) || is_object($positionStats)) {
        foreach($positionStats[0]->positions as $positionStat) {
          echo $positionStat->id. "\n";
          $contador = 0;
          foreach($positions as $position) {

            if ($position->legacy_id === $positionStat->id) { // ($position->legacy_stat_request > $updated_at) ) {
              $contador = 1;

              DB::table('positions')
              ->where('legacy_id', $positionStat->id)
              ->update([
                       'sport_id'            => $positionStat->sport_id,
                       'name'                => $positionStat->name,
                       'description'         => $positionStat->description,
                       'legacy_stat_request' => $updated_at
                       ]);
            }
          }
          if ($contador == 0) {

            $position                      =  new Position();
            $position->legacy_id           =  $positionStat->id;
            $position->sport_id            =  $positionStat->sport_id;
            $position->name                =  $positionStat->name;
            $position->description         =  $positionStat->description;
            $position->legacy_stat_request =  $updated_at;
            $position->save();
          }
        }
      }
    }
  }


static $allPositions = '[
    {
    "id": 1,
    "name": "Baseball",
    "description": "Baseball",
    "icon_updated_at": null,
    "icon_file_size": null,
    "icon_content_type": null,
    "icon_file_name": null,
    "structure_template": "{\"out\": 0, \"ball\": 0, \"annotation\": 0, \"strike\": 0}",
    "positions": [
        {
            "id": 1,
            "sport_id": 1,
            "name": "PA",
            "description": "Cuerpo de pitcheo"
        },
        {
            "id": 2,
            "sport_id": 1,
            "name": "C",
            "description": "Catcher"
        },
        {
            "id": 3,
            "sport_id": 1,
            "name": "1B",
            "description": "1 Base"
        },
        {
            "id": 4,
            "sport_id": 1,
            "name": "2B",
            "description": "2 Base"
        },
        {
            "id": 5,
            "sport_id": 1,
            "name": "3B",
            "description": "3 Base"
        }
    ]
}
]';

}
