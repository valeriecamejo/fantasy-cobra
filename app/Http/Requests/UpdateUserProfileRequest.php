<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
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
    'dni'      => 'required|max:9999999999|min:999999|numeric|unique:users,dni,' . Auth::user()->id,
    'phone'    => 'required|max:9999999999999|min:9999999999|numeric|'
    ];
  }

  public function messages()
  {
    return [
    'dni.max'       => 'La cédula no debe ser mayor de 9 dígitos',
    'dni.min'       => 'La cédula no debe ser menor de 6 dígitos.',
    'dni.numeric'   => 'La cédula solo puede contener números.',
    'phone.max'     => 'El teléfono no debe ser mayor de 13 dígitos.',
    'phone.min'     => 'El teléfono no debe ser menor de 11 dígitos.',
    'phone.numeric' => 'El teléfono solo puede contener números.'
    ];
  }
}
