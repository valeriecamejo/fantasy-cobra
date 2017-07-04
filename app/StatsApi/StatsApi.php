<?php

namespace App\StatsApi;

use GuzzleHttp\Client;

class StatsApi {

//Base url
  static $base_url = 'http://api.detrasdelhome.com/v1/';

  static $endpoint_login = 'sign_in';

  static $params = ['access-token' => null,
                    'uid'          => null,
                    'client'       => null];

//Creating a Client
  static $clientHttp = null;

/*
  $res = $client->post($base_url . 'sign_in', [
                       'json' => ['email' => 'jedkaryd@gmail.com',
                       'password' => '123stats']
                       ]);

  $res->getStatusCode();

  echo "access-token => {$res->getHeader('access-token')[0]} \n\n";
  echo "client => {$res->getHeader('client')[0]} \n\n";
  echo "uid => {$res->getHeader('uid')[0]} \n\n";

  echo  "\n\n" . $res->getBody();*/

  static function clientHttp(){
    if (self::$clientHttp == null) {
      self::$clientHttp = new Client();
      //self::login();

   /*   self::$clientHttp->setDefaultOption('headers/access-token', self::$params['access_token']);
      self::$clientHttp->setDefaultOption('headers/uid', self::$params['uid']);
      self::$clientHttp->setDefaultOption('headers/client', self::$params['client']);*/
      //self::$clientHttp->setDefaultOption('headers', self::$params);
    }

    return self::$clientHttp;
  }



  static function login() {

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

    return $response;
  }

}
