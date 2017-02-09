<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error_incidence extends Model
{
	protected $table = 'error_incidences';
	protected $fillable = ['script', 'function', 'code', 'line', 'description'];
}
