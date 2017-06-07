<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller {

/**********************************************
* withdrawals.
* @param $request
* @return redirect()->to('usuario/perfil-usuario');
**********************************************/
  protected function withdrawal(WithdrawalRequest $request) {

    $withdrawal = Payment::withdrawal($request->all());

    if ($withdrawal) {

      Session::flash('message', 'Solicitud Registrada Exitosamente.');
      Session::flash('class', 'success');
    } else {

      Session::flash('message', 'Error en los datos.');
      Session::flash('class', 'danger');
    }
    return redirect()->to('usuario/perfil-usuario');
  }

}
