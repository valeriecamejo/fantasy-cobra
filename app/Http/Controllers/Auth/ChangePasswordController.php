<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Session;

class ChangePasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Change Password  Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling change password requests
    |
    */

    /**
    * Show the form for change password.
    *
    * @return \Illuminate\View\View
    */
    protected function show_change_password_form(){

        return view('auth.passwords.changepassword');
    }


    /**
    * Update user password after validation
    * 
    * @param $request
    * @return redirect()->to('usuario/cambiar-password');
    */
      protected function change_password(Request $request) {
    

        $update_user_password =  User::update_user_password($request->all());
    
        if ($update_user_password) {
    
          Session::flash('message', 'Contraseña actualizada correctamente.');
          Session::flash('class', 'success');
          } else {
    
          Session::flash('message', 'Error al actualizar los datos.');
          Session::flash('class', 'danger');
          }
        return redirect()->to('usuario/cambiar-password');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
