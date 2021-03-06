<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterLandingRequest extends FormRequest
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
  public function rules() {
    return [
      'email'          => 'required|email|max:255|unique:users,email',
      'username'       => 'required|max:255|alpha_num|unique:users,username',
      'password'       => 'required|min:6|confirmed',
      'terms_politics' => 'required',
      'adult'          => 'required'
    ];
  }
}
