<?php

namespace App\StatsApi;

use DB;
use DateTime;
use App\Tournament;
use Carbon\Carbon;
use App\Lib\Ddh\UtilityDate;

class TournamentsApi extends StatsApi {

/***************************************************
* saveUpdateTournaments: Save or update a tournament
* @param void
* @return void
***************************************************/

  public static function saveUpdateTournaments () {

//TO DO
//***************************************************
//Modificar los campos start_date y end_date cuando
//son almacenados en BD
//***************************************************

//********************************************************
//Solicitud de Servicio al API
    $service         = 'tournaments';
    $jsonApi         = StatsApi::get($service);
    $tournamentStats   = json_decode($jsonApi);
//********************************************************

    $updated_at      = '2017-07-12 15:58:03';
    $tournaments     = DB::table('tournaments')->get();
    // $tournamentStats = json_decode(self::$allTournaments);

      if (is_array($tournamentStats) || is_object($tournamentStats)) {
        foreach($tournamentStats as $tournamentStat) {
          $contador   = 0;
          $start_date = new DateTime($tournamentStat->start_date);
          $end_date   = new DateTime($tournamentStat->end_date);
          foreach($tournaments as $tournament) {
            if ($tournament->legacy_id == $tournamentStat->id) { //&& ($tournament->legacy_stat_request > $updated_at) ) {
              $contador = 1;

              DB::table('tournaments')
              ->where('legacy_id', $tournamentStat->id)
              ->update([
                       'championship_id'     => $tournamentStat->championship_id,
                       'name'                => $tournamentStat->name,
                       'start_date'          => $start_date,
                       'end_date'            => $end_date,
                       'is_active'          => $tournamentStat->is_active,
                       'status_api'          => $tournamentStat->is_active,
                       'legacy_stat_request' => $updated_at
                       ]);
            }
          }
          if ($contador == 0) {

            $tournament                      =  new Tournament();
            $tournament->legacy_id           =  $tournamentStat->id;
            $tournament->championship_id     =  $tournamentStat->championship_id;
            $tournament->name                =  $tournamentStat->name;
            $tournament->start_date          =  $start_date;
            $tournament->end_date            =  $end_date;
            $tournament->is_active          =  $tournamentStat->is_active;
            $tournament->status_api          =  $tournamentStat->is_active;
            $tournament->legacy_stat_request =  $updated_at;
            $tournament->save();
          }
      }
    }
  }
}

