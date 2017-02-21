<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
	protected $table = 'prizes';
	protected $fillable = ['description', 'active', 'type', 'total_people'];
}
