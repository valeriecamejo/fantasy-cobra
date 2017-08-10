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

//*************************************************
//Solicitud de Servicio al API
    $service           = 'championships';
    $jsonApi           = StatsApi::get($service);
    $championshipStats = json_decode($jsonApi);
//*************************************************
    $updated_at        = '2017-07-12 15:58:03';
    $championships     = DB::table('championships')->get();

      if (is_array($championshipStats) || is_object($championshipStats)) {
        foreach($championshipStats as $championshipStat) {
          $contador = 0;
          foreach($championships as $championship) {
            if ($championship->legacy_id === $championshipStat->id) { // ($championship->legacy_stat_request < $updated_at) ) {
              $contador = 1;

              DB::table('championships')
              ->where('legacy_id', $championshipStat->id)
              ->update([
                 'name'                => $championshipStat->name,
                 'description'         => $championshipStat->description,
                 'status_api'          => $championshipStat->is_active,
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
            $championship->status_api          =  $championshipStat->is_active;
            $championship->legacy_stat_request =  $updated_at;
            $championship->save();
            echo $championship;
        }
      }
    }
  }
}
