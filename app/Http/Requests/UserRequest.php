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
      'cod_country'     => 'required|max:9999|numeric',
      'phone'           => 'required|numeric|max:999999999|min:9999999',
      'password'        => 'required|min:6|confirmed',
      'terms_politics'  => 'required',
      'adult'           => 'required'
    ];
  }
  public function messages()
  {
    return [
      'dni.max'             => 'La cédula no debe ser mayor de 9 dígitos',
      'dni.min'             => 'La cédula no debe ser menor de 6 dígitos.',
      'dni.numeric'         => 'La cédula solo puede contener números.',
      'phone.max'           => 'El teléfono no debe ser mayor de 9 dígitos.',
      'phone.min'           => 'El teléfono no debe ser menor de 7 dígitos.',
      'phone.numeric'       => 'El teléfono solo puede contener números.',
      'cod_country.max'     => 'El código de país no debe ser mayor de 4 dígitos y solo puede contener números.',
      'cod_country.numeric' => 'El código de país solo puede contener números.',
    ];
  }
}
