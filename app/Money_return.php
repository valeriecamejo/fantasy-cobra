<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money_return extends Model
{
	protected $table = 'money_returns';
	protected $fillable = [
                         'user_id',
                         'competition_id',
                         'balance_before',
                         'balance_after'
                        ];
}
