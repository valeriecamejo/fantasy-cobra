<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/lobby';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

  /**
   * Get the needed authorization credentials from the request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  protected function credentials(Request $request)
  {
    return  array_merge($request->only($this->username(), 'password'),['status' => User::STATUS_ACTIVE]);
  }

  /**
   * Get the failed login response instance.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  protected function sendFailedLoginResponse(Request $request)
  {
    $errors = [$this->username() => trans('auth.failed')];

    if ($request->expectsJson()) {
      return response()->json($errors, 422);
    }

    Session::flash('class', 'danger');
    Session::flash('message', ' Hubo un problema al intentar ingresar, verifique sus datos.');
    return redirect()->back()
      ->withInput($request->only($this->username(), 'remember'))
      ->withErrors($errors);
  }

}
