<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
	protected $table = 'championships';
	protected $fillable = [
  'sport_id', 'name', 'description'
  ];

  public static function verify_championship($sport, $championship) {

    $verify_sport                     = Sport::verify_sport($sport);

    $verify_championship   = Championship::where('sport_id', '=', $verify_sport->id)
      ->where('name', '=', $championship)
      ->get();

    return $verify_championship;
  }
}
