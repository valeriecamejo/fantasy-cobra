<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table = 'championships';
	protected $fillable = ['country_id', 'name', 'description'];
}
