<?php

namespace App\StatsApi;

use DB;
use App\Sport;

class SportsApi extends StatsApi {

/**************************************************
* saveUpdateSports: Save or update Sports
* @param void
* @return void
**************************************************/

  public static function saveUpdateSports () {

//***********************************************************
//Sustituir el legacy_stat_request por el updated_at del API
//***********************************************************

/**************************************************
* removeAccents: Removes accents from a string
* @param string
* @return string
**************************************************/

  function removeAccents ($string) {

    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
    $string = utf8_decode($string);
    $string = strtr($string, utf8_decode($originales), $modificadas);
    return utf8_encode($string);
  }

/**************************************************
* removeAccents: Change name to English
* @param name
* @return nameEnglish
**************************************************/

function nameToEnglish ($name) {

  if ( $name == 'futbol') {
    return $nameEnglish = 'football';
  } else {
    if ( $name == 'beisbol' ) {
      return $nameEnglish = 'baseboll';
    } else {
     return $name;
    }
  }
}

    $service    = 'sports';
    $jsonApi    = StatsApi::get($service);
    $sportStats = json_decode($jsonApi);
    $updated_at = '2017-07-12 15:58:03';
    $sports     = DB::table('sports')->get();

    if (is_array($sportStats) || is_object($sportStats)) {

      foreach($sportStats as $sportStat) {
        $contador = 0;
        $name_api = removeAccents(strtolower($sportStat->name));
        $name     = nameToEnglish($name_api);
        foreach($sports as $sport) {

          if ($sport->legacy_id == $sportStat->id) { // ($sport->legacy_stat_request < $updated_at) ) {
            $contador = 1;

            DB::table('sports')
            ->where('legacy_id', $sportStat->id)
            ->update([
                     'name'                => $name,
                     'name_api'            => $sportStat->name,
                     'description'         => $sportStat->description,
                     'legacy_stat_request' => $updated_at
                     ]);
          }
        }
        if ($contador == 0) {

          $sport                      =  new Sport();
          $sport->legacy_id           =  $sportStat->id;
          $sport->name                =  $name;
          $sport->name_api            =  $sportStat->name;
          $sport->description         =  $sportStat->description;
          $sport->legacy_stat_request =  $updated_at;
          $sport->save();
        }
      }
    }
  }
}
