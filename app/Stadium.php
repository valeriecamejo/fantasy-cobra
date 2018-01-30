<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
	protected $table = 'stadiums';
	protected $fillable = [
                         'city_id',
                         'name',
                         'capacity',
                         'image',
                         'description'
                        ];
}
