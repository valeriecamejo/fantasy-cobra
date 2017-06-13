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

/********************************************
* withdrawal: Registration of withdrawal
              request
* @param void
* @return $won_competitions
********************************************/
  public static function withdrawal($input) {

  $payment                   = new Payment;
  $payment->user_id          = Auth::user()->id;
  $payment->amount           = $input['amount'];
  $payment->transaction_type = 'retiro';
  $payment->balance_before   = Auth::user()->bettor->balance;
  $payment->account_number   = $input['number_account'];
  $payment->bank             = $input['bank'];
  $payment->status           = 'pendiente';
  $payment->approved         = false;
  $payment->account_type     = $input['type_account'];

    if ($payment->save()) {
      return $payment;
    }

  }

}
