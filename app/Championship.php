<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
	protected $table = 'championships';
	protected $fillable = ['sport_id', 'name', 'description'];
}
