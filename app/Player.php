<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

  // TODO tomar en cuanta que todo consulta debe estar combinada con el championship

	protected $table = 'players';
	protected $fillable = [
  'team_id', 'sport_id', 'name', 'last_name', 'position', 'salary', 'points', 'status'
  ];

  function less_than_equal_salary($salary) {

  }
}
