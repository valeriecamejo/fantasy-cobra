<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
	protected $fillable = ['user_id', 'name', 'description', 'cost', 'photo', 'url', 'web', 'active', 'orde', 'type', 'min', 'max', 'rate', 'deposit', 'quantity', 'code_promotional', 'affiliate_min', 'affiliate_max', 'affiliate_rate', 'affiliate_deposit', 'affiliate_quantity', 'start_date', 'end_date'];
}
