<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

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
  $payment->transaction_type = 'retiro';
  $payment->balance_before   = Auth::user()->bettor->balance;
  $payment->account_number   = $input['number_account'];
  $payment->bank             = $input['bank'];
  $payment->status           = 'pendiente';
  $payment->approved         = false;
  $payment->transfer_date    = Carbon::now()->toDateString();
  $payment->account_type     = $input['type_account'];

  $verify_amount = Payment::verify_amount($input['amount']);
    if ($verify_amount) {
      $payment->amount         = $input['amount'];
      $payment->save();
      $new_balance = (Auth::user()->bettor->balance - $input['amount']);
      return [
              true,
              $payment,
              $new_balance
      ];
    } else {
      return [
               false,
               "Verifique el monto minimo a retirar y su balance"
             ];
    }
  }

/********************************************
* verify_amount: validation for balance
* @param mount
* @return bool
********************************************/
  public static function verify_amount($mount_withdraw) {

   $min_withdraw = \App\Lib\Ddh\SettingVariables::getSettings('min_withdraw');
   $user_balance = floatval(Auth::user()->bettor->balance);

    if( (floatval($mount_withdraw) < floatval($min_withdraw)) || (floatval($mount_withdraw) > floatval($user_balance)) ) {
      return false;
    } else {
      return true;
    }
  }
}
