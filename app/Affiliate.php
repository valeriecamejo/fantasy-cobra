<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
  protected $table = 'affiliates';
  protected $fillable = [
    'user_id',
    'city_id',
    'promotional_cod',
    'promotional_url',
    'balance', 'rate',
    'referred_friends',
    'referred_friends_pay'
  ];

  public static function find_affiliate_code($code_ref){
    $promotional_cod	= Affiliate::where('promotional_cod','=',$code_ref)
    ->get();
    if ($promotional_cod){
      return true;
    }else{
      return false;
    }
  }
}
