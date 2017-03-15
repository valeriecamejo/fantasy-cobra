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
}

