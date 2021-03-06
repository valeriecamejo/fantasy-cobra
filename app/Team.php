<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $table = 'teams';
	protected $fillable = [
                         'legacy_id',
                         'stadium_id',
                         'name',
                         'nickname',
                         'short_nickname',
                         'logo',
                         'president',
                         'coach',
                         'history'
                        ];


}
