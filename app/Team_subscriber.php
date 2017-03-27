<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team_subscriber extends Model
{
	protected $table = 'team_subscribers';
	protected $fillable = [
  'sport_id', 'competition_id', 'team_id', 'team_user_id', 'amount', 'points', 'date', 'balance_before', 'bonus', 'balance', 'is_winner'
  ];
}
