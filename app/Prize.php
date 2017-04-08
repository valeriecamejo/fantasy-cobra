<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
	protected $table = 'prizes';
	protected $fillable = [
  'description', 'active', 'type', 'total_people'
  ];

  public static function prize_min_user($min_user){

   $prize = Prize::where('total_people', '<', $min_user)
     ->where('active', '=', 1)
     ->orderBy('total_people','ASC')
     ->get();
   return $prize;
  }
}
