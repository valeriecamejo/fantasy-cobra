<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Bettor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\WithdrawalRequest;
use App\Http\Requests\TransferRequest;
use App\Http\Requests\TdcRequest;

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
* show_transfers: View for bank transfer payments
* @param  void
* @return view
*************************************************/

  public function show_transfers() {

    return View('ATM.transfer');
  }

  /***************************************************
* show_tdcs: View for credircard payments
* @param  void
* @return view
*************************************************/

  public function show_tdcs() {

    return View('ATM.tdc');
  }

/**************************************************
* withdrawals.
* @param $request
* @return redirect()->to('usuario/retirar-dinero');
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

  /**************************************************
* transfers.
* @param $request
* @return redirect()->to('usuario/depositar-dinero');
***************************************************/

  public function transfer(TransferRequest $request) {

    $transfer = Payment::transfer($request->all());

    if ($transfer[0] == true) {
      Bettor::discountBalanceBettor($transfer[2]);
      Session::flash('message', 'Solicitud Registrada Exitosamente.');
      Session::flash('class', 'success');
    } elseif ($transfer[0] == false) {
        Session::flash('message', $transfer[1]);
        Session::flash('class', 'danger');
    } else {
      Session::flash('message', 'Debe completar todos los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('usuario/depositar-dinero');
  }

    /**************************************************
* tdc.
* @param $request
* @return redirect()->to('usuario/depositar-tdc');
***************************************************/

  public function tdc(TdcRequest $request) {

    $tdc = Payment::tdc($request->all());

    if ($tdc[0] == true) {
      Bettor::discountBalanceBettor($tdc[2]);
      Session::flash('message', 'Solicitud Registrada Exitosamente.');
      Session::flash('class', 'success');
    } elseif ($tdc[0] == false) {
        Session::flash('message', $tdc[1]);
        Session::flash('class', 'danger');
    } else {
      Session::flash('message', 'Debe completar todos los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('usuario/depositar-tdc');
  }

}
