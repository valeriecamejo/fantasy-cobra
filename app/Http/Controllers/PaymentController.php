<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Bettor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\WithdrawalRequest;

class PaymentController extends Controller {


/***************************************************
* show_withdrawals: View for withdrawal
* @param  void
* @return view
*************************************************/

  public function show_withdrawals() {

    return View('ATM.withdrawals');
  }

  /***************************************************
* show_wtransfers: View for bank transfer payments
* @param  void
* @return view
*************************************************/

  public function show_transfers() {

    return View('ATM.transfer');
  }

/**************************************************
* withdrawals.
* @param $request
* @return redirect()->to('usuario/perfil-usuario');
***************************************************/

  public function withdrawal(WithdrawalRequest $request) {

    $withdrawal = Payment::withdrawal($request->all());

    if ($withdrawal[0] == true) {
      Bettor::discountBalanceBettor($withdrawal[2]);
      Session::flash('message', 'Solicitud Registrada Exitosamente.');
      Session::flash('class', 'success');
    } elseif ($withdrawal[0] == false) {
        Session::flash('message', $withdrawal[1]);
        Session::flash('class', 'danger');
    } else {
      Session::flash('message', 'Debe completar todos los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('usuario/retirar-dinero');
  }

}
