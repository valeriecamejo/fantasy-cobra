<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $table = 'games';
	protected $fillable = ['tournament_id', 'tournament_group_id', 'team_id_home', 'team_id_away', 'start_date', 'end_date', 'score_home', 'score_away', 'status', 'schema_team_home', 'schema_team_away', 'mvp'];
}
