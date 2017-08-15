<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class UserRequest extends FormRequest
{
  /**
   * @var \Illuminate\Routing\Route
   */
  private $route;
  public function __construct(Route $route)
  {
    $this->route = $route;
  }

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
  public function rules() {
    return [
      'name'            => 'required|max:255',
      'last_name'       => 'required|max:255',
      'dni'             => 'required|numeric|min:999999|max:999999999|unique:users,dni',
      'email'           => 'required|email|max:255|unique:users,email',
      'username'        => 'required|max:255|alpha_num|unique:users,username',
      'phone'           => 'required|numeric|min:000999999',
      'cod_country'     => 'required|numeric|min:0001|max:0999',
      'password'        => 'required|min:6|confirmed',
      'terms_politics'  => 'required',
      'adult'           => 'required'
    ];
  }
  public function messages()
  {
    return [
      'dni.max'              => 'La cédula no debe ser mayor de 9 dígitos',
      'dni.min'              => 'La cédula no debe ser menor de 6 dígitos.',
      'dni.numeric'          => 'La cédula solo puede contener números.',
      'phone.min'            => 'El número de teléfono debe contener 7 dígitos.',
      'phone.numeric'        => 'El número de teléfono solo puede contener números.',
      'cod_country.min'      => 'El código de país debe ser de 4 dígitos y solo puede contener números.',
      'cod_country.max'      => 'El código de país debe ser de 4 dígitos y solo puede contener números.',
      'cod_country.numeric'  => 'El código de país solo puede contener números.',
      'cod_country.required' => 'El código de país es requerido.',
    ];
  }
}
