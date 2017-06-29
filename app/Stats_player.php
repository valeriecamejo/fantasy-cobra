<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats_player extends Model
{
  protected $table    = 'stats_players';
  protected $fillable = [
                          'team_id',
                          'sport_id',
                          'name',
                          'last_name',
                          'position',
                          'salary',
                          'points',
                          'status'
                        ];
}
