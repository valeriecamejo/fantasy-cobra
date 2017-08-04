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

  $sports = DB::table('sports')->get();

    foreach($sports as $sport) {

      $sport_legacy_id = $sport->legacy_id;
      $sport_id = $sport->id;
      $service         = 'sports/'. $sport_legacy_id .'/positions';
 echo     $jsonApi         = StatsApi::get($service);
      $positionStats   = json_decode($jsonApi);
      $updated_at      = '2017-07-12 15:58:03';
      $positions       = DB::table('positions')->get();

      if (is_array($positionStats) || is_object($positionStats)) {

        foreach($positionStats->positions as $positionStat) {

          $contador = 0;
          foreach($positions as $position) {

            if ($position->legacy_id === $positionStat->id) { // ($position->legacy_stat_request > $updated_at) ) {
              $contador = 1;

              DB::table('positions')
              ->where('legacy_id', $positionStat->id)
              ->update([
                       'sport_id'            => $sport_id,
                       'name'                => $positionStat->name,
                       'description'         => $positionStat->description,
                       'legacy_stat_request' => $updated_at
                       ]);
            }
          }
          if ($contador == 0) {

            $position                      =  new Position();
            $position->legacy_id           =  $positionStat->id;
            $position->sport_id            =  $sport_id;
            $position->name                =  $positionStat->name;
            $position->description         =  $positionStat->description;
            $position->legacy_stat_request =  $updated_at;
            $position->save();
          }
        }
      }
    }
  }
}
