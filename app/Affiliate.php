<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
	protected $table = 'affiliates';
	protected $fillable = [
  'user_id', 'city_id', 'promotional_cod', 'promotional_url', 'balance', 'rate', 'referred_friends', 'referred_friends_pay'
  ];
}
