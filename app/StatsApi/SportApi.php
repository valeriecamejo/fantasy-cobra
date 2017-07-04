<?php

namespace App\StatsApi;

class SportApi extends StatsApi {

  static $endpoint = 'sports';

  static function getAll() {

    parent::login();
    print_r(parent::$params);
    $sports = parent::clientHttp()->get(parent::$base_url . self::$endpoint, ['headers' => parent::$params]);

    return $sports;
  }

}

