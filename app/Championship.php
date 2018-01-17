<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
	protected $table = 'championships';
	protected $fillable = [
                         'legacy_id',
                         'sport_id',
                         'name',
                         'description',
                         'avatar'
                        ];

  public static function verify_championship($sport, $championship) {

    $verify_sport                     = Sport::verify_sport($sport);

    $verify_championship   = Championship::where('sport_id', '=', $verify_sport)
      ->where('name', '=', $championship)
      ->first();
    return $verify_championship;
  }
}
