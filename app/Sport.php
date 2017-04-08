<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
	protected $table = 'sports';
	protected $fillable = [
  'name', 'description'
  ];

  public static function verify_sport($sport) {
    $verify_sport   = Sport::where('name', '=', $sport)
      ->get();

    return $verify_sport->id;
  }
}
