<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $table = 'user_types';
	protected $fillable = [
                         'name',
                         'description'
                        ];
}
