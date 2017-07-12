<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  protected $table = 'positions';
  protected $fillable = [
                         'legacy_id',
                         'sport_id',
                         'name',
                         'description'
                        ];

  public static function prize_min_user($min_user){

   $prize = Prize::where('total_people', '<', $min_user)
     ->where('active', '=', 1)
     ->orderBy('total_people','ASC')
     ->get();
   return $prize;
  }

  public static function positionPlayer($position_id){

   $position = Position::where('legacy_id', $position_id)
     ->get();
   return $position;
  }

}
