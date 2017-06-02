<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
	protected $table = 'payments';
	protected $fillable = [
  	'user_id', 
  	'date', 
  	'amount', 
  	'paid', 
  	'balance_before', 
  	'account_number', 
  	'bank', 
  	'reference_number', 
  	'type', 
  	'approved_pay', 
  	'transfer_date', 
  	'type_account'
  ];
}
