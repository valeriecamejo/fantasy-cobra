<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_user extends Model
{
    protected $table = 'team_users';
	protected $fillable = [
  'user_id', 'sport_id', 'championship_id', 'date_inscription', 'remaining_salary', 'name'
  ];
}
