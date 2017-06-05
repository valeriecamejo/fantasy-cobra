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

/********************************************
* won_competitions: List the history
                    of competitions
                    won of the user.
* @param void
* @return $won_competitions
********************************************/
  public static function withdrawal($input) {

  $payment                   = new Payment;
  $payment->user_id          = Auth::user()->user_id;
  $payment->date             = $today = date('Y-m-d hh:i:s');
  $payment->amount           = $input[''];
  $payment->transaction_type = $input[''];
  $payment->balance_before   = $input[''];
  $payment->account_number   = $input['number_account'];
  $payment->bank             = $input['bank'];
  $payment->point_response   = $input[''];
  $payment->device           = $input[''];
  $payment->txid             = $input[''];
  $payment->error_result     = $input[''];
  $payment->status           = $input[''];
  $payment->code_error       = $input[''];
  $payment->nai              = $input[''];
  $payment->approved_pay     = $input[''];
  $payment->total_currency   = $input[''];
  $payment->paypal_email     = $input[''];
  $payment->country          = $input[''];
  $payment->direction        = $input[''];
  $payment->state            = $input[''];
  $payment->city             = $input[''];
  $payment->reference_number = $input[''];
  $payment->transfer_date    = $input[''];
  $payment->account_type     = $input[''];

  if ($payment->save()) {
    return $user;
  }

}
