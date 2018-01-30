<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
	protected $table = 'sports';
	protected $fillable = [
                         'legacy_id',
                         'name',
                         'description',
                         'approved'
                        ];

  public static function verify_sport($sport) {
    $verify_sport   = Sport::where('name', '=', $sport)
      ->first();

    return $verify_sport->id;
  }
}
