<?php

namespace App\StatsApi;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class StatsApi {

//Base url
  static $base_url       = 'https://api.detrasdelhome.com/v1/'
  static $endpoint_login = 'sign_in';
  static $params         = ['access-token' => null,
                            'uid'          => null,
                            'client'       => null];

//Creating a Client
  static $clientHttp = null;

  static function clientHttp () {

    if (self::$clientHttp == null) {
        self::$clientHttp = new Client();
    }

    return self::$clientHttp;
  }

  static function login () {

    //echo "\ntry login...";
    $response = self::clientHttp()->post(self::$base_url . self::$endpoint_login,[
                       'json' => ['email'    => 'jedkaryd@gmail.com',
                                  'password' => '123stats']
                       ]);
    return self::prepareParams($response);;
  }

  static function prepareParams($response) {
    $params = [ 'access-token' => $response->getHeader('access-token')[0],
                'uid'          => $response->getHeader('uid')[0],
                'client'       => $response->getHeader('client')[0]];

   // print_r($params);
    return self::$params = $params;
  }

  static function get($resource) {

    $resp = self::service($resource);
  //  echo "\nStatusCode = {$resp->getStatusCode()}";
    if ($resp->getStatusCode() == 401 ) {
      echo "\nUnauthorized";
      self::login();

      $resp = self::service($resource);
    } elseif ($res->getStatusCode() < 300) {
      self::prepareParams($resp);
    }

    return $resp->getBody();
  }

  static function service ($service_url) {

    $resp = null;

    try{
      $resp = self::clientHttp()->get(self::$base_url . $service_url, [
      'headers' => self::$params
      ]);

      self::prepareParams($resp);
    } catch (RequestException $e) {
        echo Psr7\str($e->getRequest());
        if ($e->hasResponse()) {
            echo Psr7\str($e->getResponse());
            $resp = $e->getResponse();
        }
    }

    return $resp;
  }
}
