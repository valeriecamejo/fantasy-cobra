<?php

namespace App\StatsApi;

 use GuzzleHttp\Client;

class StatsApi {


  public static function login() {

    static $base_url = 'http://api.detrasdelhome.com/v1/';

    static $endpoint_login = 'sign_in';

    static $params = ['access-token' => null,
                      'uid'          => null,
                      'client'       => null];

//Creating a Client
  static $clientHttp = null;

    $client = new Client();
    $res = $client->post($base_url . 'sign_in', [
                       'json' => ['email' => 'jedkaryd@gmail.com',
                                  'password' => '123stats']
                       ]);

  }
}
