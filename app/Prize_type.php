<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize_type extends Model
{
	protected $table = 'prize_types';
	protected $fillable = ['prize_id', 'range', 'rate', 'winning', 'rate_win', 'rate_range', 'equitable'];
}
