<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UserRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
  protected $redirectTo = '/lobby';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('guest');
  }

  /**
   * Register Post with Request from validation
   *
   * @param $request
   * @return \Illuminate\Http\Response
   */
  protected function register(UserRequest $request){
      $data     = $request->all();
      $user     = User::register($data);
      if ($user){
          $this->guard()->login($user);
          return redirect($this->redirectPath());
      }elseif ($user == false){
          Session::flash('danger', 'Error al registrar los datos.');
          Session::flash('class', 'danger');
          return redirect()->back();
      }
  }

  /**
   * register_successfully
   *
   * @return \Illuminate\Http\Response
   */
  protected function register_successfully(){
      return View::make('users.register_successfully');
  }
}
