<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bettor extends Model
{
	protected $table = 'bettors';
	protected $fillable = [
  'user_id', 'city_id', 'date_last_connect', 'balance', 'question', 'answer', 'code_referred', 'photo', 'url_own', 'url_promotional', 'referred_friends', 'referred_friends_pay', 'amount_deposited', 'amount_won', 'amount_referred_friends', 'bono', 'not_removable'
  ];
}
