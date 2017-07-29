<?php

namespace App\StatsApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class StatsApi {

//Base url
  static $base_url = 'https://api.detrasdelhome.com/v1/';

  static $endpoint_login = 'sign_in';

  static $params = ['access-token' => null,
                    'uid'          => null,
                    'client'       => null];

//Creating a Client
  static $clientHttp = null;


  static function clientHttp(){
    if (self::$clientHttp == null) {
      self::$clientHttp   = new Client();
    }

    return self::$clientHttp;
  }



  static function login () {

    //if (self::$clientHttp == null) {
      $response = self::clientHttp()->post(self::$base_url . self::$endpoint_login,[
                         'json' => ['email'    => 'jedkaryd@gmail.com',
                                    'password' => '123stats']
                         ]);

      $params = ['access-token' => $response->getHeader('access-token')[0],
                 'uid'          => $response->getHeader('client')[0],
                 'client'       => $response->getHeader('uid')[0]];

      self::$params = $params;
    //}
  // echo $response->getStatusCode(). "\n";   
  // echo $response->getReasonPhrase(). "\n";    
  // echo $params['access-token']. "\n";
  // echo $params['uid']. "\n";
  // echo $params['client']. "\n"; 

    return $params;
  }


  static function service ($service_url, $params) {

    $resp = self::clientHttp()->get(self::$base_url . $service_url, self::$params);

    return $resp;
  }

}
