<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats_player extends Model
{
  protected $table    = 'stats_players';
  protected $fillable = [
                          'name',
                          'legacy_id',
                          'description',
                          'sport_id',
                          'calculated',
                          'points'
                        ];
}
