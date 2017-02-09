<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
	protected $table = 'sports';
	protected $fillable = ['name', 'description'];
}
