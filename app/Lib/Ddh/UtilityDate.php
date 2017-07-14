<?php

namespace App\Lib\Ddh;

use Carbon\Carbon;

class UtilityDate {

  public static function dateAbbrevSpanish($today) {

      $wday     = $today['wday'];
      $day_week = array ("Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab");

      return $day_week[$wday];
  }

  public static function team_registered_competition($obj_teams, $team_id) {

  $cant = '';
  foreach ($obj_teams as $obj_team => $valor_obj_team) {

    if ($valor_obj_team->team_user_id == $team_id) {
      $cant ++;
    };
  }

  return $cant;
  }

  public static function dateTZ($date) {

    $date = Carbon::createFromFormat('Y-m-d H:i:s', $date, 'America/Caracas');
    $date->setTimezone('UTC');

  return $date;
  }

}


