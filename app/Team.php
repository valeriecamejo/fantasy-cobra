<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $table = 'teams';
	protected $fillable = ['stadium_id', 'name', 'nickname', 'logo', 'president', 'coach', 'history'];
}
