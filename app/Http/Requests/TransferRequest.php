<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TransferRequest extends FormRequest
{

/**************************************************
* transfers.
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
    'reference_number' => 'required|max:99999999999|numeric',
    'last_name'      => 'required',
    'dni'            => 'required|min:999999|numeric',
    'phone'          => 'required|regex:/^[0-9-]{10,14}+$/|max:99999999999999',
    'amount'         => 'required|numeric',
    'number_account' => 'required|min:11|regex:/[0-9a-zA-Z]/',
    'type_account'   => 'required',
    'bank'           => 'required',
    'email'          => 'required|email',
    ];
  }

    public function messages()
  {
    return [
    'name.required'               => 'Campo requerido',
    'last_name.required'          => 'Campo requerido',
    'dni.required'                => 'Campo requerido',
    'reference_number.required'   => 'Campo requerido',
    'reference_number.numeric'   => 'El número de referencia solo puede contener valores numericos',
    'reference_number.max'   => 'el numero de referencia debe ser menor de 11 dígitos',
    'dni.min'                     => 'La cédula no debe ser menor de 6 dígitos.',
    'dni.numeric'                 => 'La cédula solo puede contener números.',
    'phone.required'              => 'Campo requerido',
    'phone.max'                   => 'El teléfono no debe ser mayor de 14 dígitos.',
    'phone.numeric'               => 'El teléfono solo puede contener números.',
    'amount.required'             => 'Campo requerido',
    'amount.numeric'              => 'La cantidad a retirar solo puede contener números.',
    'number_account.required'     => 'Campo requerido',
    'number_account.numeric'      => 'El numero de cuenta solo puede contener números.',
    'number_account.min'          => 'El numero de cuenta debe contener minimo 11 caracteres.',
    'number_account.required'     => 'Campo requerido',
    'bank.required'               => 'Campo requerido',
    'email.required'              => 'Campo requerido',
    'email.email'                 => 'Verifique el email'

    ];
  }
}
