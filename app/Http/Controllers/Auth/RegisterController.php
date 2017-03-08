<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = '/landing';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('guest');
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data){
    return Validator::make($data, [
      'name'                  => 'required|max:255',
      'last_name'             => 'required|max:255',
      'dni'                   => 'required|max:255',
      'email'                 => 'required|email|max:255|unique:users',
      'username'              => 'required|max:255',
      'phone'                 => 'required|max:255',
      'password'              => 'required|min:6|confirmed',

    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return User
  */
  protected function create(array $data){
    return User::create([
      'user_type_id' => '3',
      'name'         => $data['name'],
      'last_name'    => $data['last_name'],
      'dni'          => $data['dni'],
      'email'        => $data['email'],
      'username'     => $data['username'],
      'phone'        => $data['phone'],
      'password'     => bcrypt($data['password']),
    ]);
  }
}
