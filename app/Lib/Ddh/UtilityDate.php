<?php

namespace App\Lib\Ddh;

class UtilityDate{

    public static function dateAbbrevSpanish($today) {

        //$today = getdate($today);
        //Log::info($today);
        $wday     = $today['wday'];//$today['wday'];
        $day_week = array ("Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab");

        return $day_week[$wday];
    }

  public  static function team_registered_competition($obj_teams, $team_id) {

  $cant = '';
  foreach ($obj_teams as $obj_team => $valor_obj_team) {

    if ($valor_obj_team->team_user_id == $team_id) {
      $cant ++;
    };
  }

  return $cant;
  }
}


