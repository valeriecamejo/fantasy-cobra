<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WithdrawalRequest extends FormRequest
{

/**************************************************
* withdrawals.
* @param $request
* @return redirect()->to('usuario/perfil-usuario');
***************************************************/

  public function authorize()
  {
      return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
    'name'           => 'required',
    'last_name'      => 'required',
    'dni'            => 'required|min:999999|numeric',
    'phone'          => 'required|regex:/^[0-9-]{11,13}+$/|max:9999999999999',
    'amount'         => 'required|numeric',
    'number_account' => 'required|min:999999999999999999999|numeric',
    'type_account'   => 'required',
    'bank'           => 'required',
    'email'          => 'required',
    ];
  }

    public function messages()
  {
    return [
    'name.required'           => 'Campo requerido',
    'last_name.required'      => 'Campo requerido',
    'dni.required'            => 'Campo requerido',
    'dni.min'                 => 'La cédula no debe ser menor de 6 dígitos.',
    'dni.numeric'             => 'La cédula solo puede contener números.',
    'phone.required'          => 'Campo requerido',
    'phone.max'               => 'El teléfono no debe ser mayor de 13 dígitos.',
    'phone.numeric'           => 'El teléfono solo puede contener números.',
    'amount.required'         => 'Campo requerido',
    'amount.numeric'          => 'La cédula solo puede contener números.',
    'number_account.required' => 'Campo requerido',
    'number_account.numeric'  => 'El numero de cuenta solo puede contener números.',
    'number_account.min'      => 'El numero de cuenta debe contener 20 caracteres.',
    'bank.required'           => 'Campo requerido',
    'email.required'          => 'Campo requerido'

    ];
  }
}
