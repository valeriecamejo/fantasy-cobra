<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TdcRequest extends FormRequest
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
    'dni'            => 'required|min:999999|numeric',
    'phone'          => 'required|max:99999999999999|regex:/^[0-9]{10,14}+$/',
    'security_code'  => 'required|max:9999|regex:/^[0-9]{3,4}+$/',
    'amount'         => 'required|numeric',
    'number_account' => 'required|numeric|max:9999999999999999|regex:/^[0-9]{13,16}+$/',
    'creditcardtype'   => 'required',
    'email'          => 'required|email',
    ];
  }

    public function messages()
  {
    return [
    'name.required'           => 'Campo requerido',
    'dni.required'            => 'Campo requerido',
    'dni.min'                 => 'La cédula no debe ser menor de 6 dígitos.',
    'dni.numeric'             => 'La cédula solo puede contener números.',
    'phone.required'          => 'Campo requerido',
    'phone.max'               => 'El teléfono no debe ser mayor de 14 dígitos.',
    'phone.numeric'           => 'El teléfono solo puede contener números.',
    'amount.required'         => 'Campo requerido',
    'amount.numeric'          => 'La cantidad a retirar solo puede contener números.',
    'number_account.required' => 'Campo requerido',
    'number_account.numeric'  => 'El numero de tarjeta solo puede contener números.',
    'number_account.max'      => 'El numero de tarjeta debe contener maximo 16 digitos',
    'number_account.regex'    => 'Introduzca un numero de tarjeta valido',
    'creditcardtype.required'           => 'Campo requerido',
    'email.required'          => 'Campo requerido',
    'security_code.required'  => 'Campo requerido',
    'security_code.regex'  => 'Introduzca un codigo numerico valido',
    'security_code.numeric'  => 'El campo solo puede contener números',
    'email.email'             => 'Verifique el email'

    ];
  }
}
