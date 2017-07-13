
<?php

namespace App\StatsApi;

class TournamentsApi extends StatsApi {

/********************************************
* saveUpdateTournaments: Save or team of user
* @param $players
* @return $players
********************************************/

public static function saveUpdateTournaments () {

  return $players = DB::table('tournaments')->get();

}

}

