<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller {

  public function logout() {

    Auth::logout();
    return view('home.home');
  }

  public function login() {

    return view('home.landing');
  }

  protected function register_successfully() {

    return View::make('users.register_successfully');
  }

  protected function show_user_profile() {

    return view('users.profile');
  }

/**********************************************
* update_user_profile.
* @param $request
* @return redirect()->to('usuario/perfil-usuario');
**********************************************/
  protected function update_user_profile(UpdateUserProfileRequest $request) {

    $update_user_profile = User::update_user_profile($request->all());

    if ($update_user_profile) {

      Session::flash('message', 'Perfil actualizado correctamente.');
      Session::flash('class', 'success');
      } else {

      Session::flash('message', 'Error al actualizar los datos.');
      Session::flash('class', 'danger');
      }
    return redirect()->to('usuario/perfil-usuario');
  }

/**********************************************
* refer_friends.
* @param void
* @return
**********************************************/
  protected function refer_friends() {

    $refer_friends = User::refer_friends();
    return view('users.refer');
  }
}
