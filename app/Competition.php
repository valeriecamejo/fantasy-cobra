<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
	protected $table = 'competitions';
	protected $fillable = [
  'user_id', 'prize_id', 'sport_id', 'championship_id', 'name', 'type', 'date', 'user_max', 'user_min', 'prize_guaranteed', 'status', 'entry_cost', 'password', 'entry', 'cost_guaranteed', 'description' ,'duration', 'start_date', 'end_date', 'pot', 'free', 'outstanding', 'enrolled'
  ];
}
