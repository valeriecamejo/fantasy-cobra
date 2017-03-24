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
  public function rules()
  {
    if($this->route->parameterNames() == 'edit') {
      return [
        'name'        => 'required|max:255',
        'last_name'   => 'required|max:255',
        'dni'         => 'required|max:255|unique:users,dni,' . $this->route->getParameter('id'),
        'email'       => 'required|email|max:255|unique:users,email,' . $this->route->getParameter('id'),
        'username'    => 'required|max:255|unique:users,username,' . $this->route->getParameter('id'),
        'cod_country' => 'required|max:5',
        'phone'       => 'required|max:255',
        'password'    => 'confirmed|min:6'
      ];
    }else{
      return [
        'name'           => 'required|max:255',
        'last_name'      => 'required|max:255',
        'dni'            => 'required|max:255|unique:users,dni',
        'email'          => 'required|email|max:255|unique:users,email',
        'username'       => 'required|max:255|unique:users,username',
        'cod_country'    => 'required|max:5',
        'phone'          => 'required|max:255',
        'password'       => 'required|min:6|confirmed',
        'terms_politics' => 'required',
        'adult'          => 'required'
      ];
    }
  }
}
