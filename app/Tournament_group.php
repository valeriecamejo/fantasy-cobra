<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament_group extends Model
{
	protected $table = 'tournament_groups';
	protected $fillable = ['tournament_id', 'name', 'description'];
}
