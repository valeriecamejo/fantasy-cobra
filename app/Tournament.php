<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
	protected $table = 'tournaments';
	protected $fillable = [
  'championship_id', 'name', 'start_date', 'end_date', 'is_active'
  ];
}
