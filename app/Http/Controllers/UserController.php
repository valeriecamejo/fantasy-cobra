<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(){
      Auth::logout();
      return view('home.landing');
    }

    protected function register_successfully(){
      return View::make('users.register_successfully');
    }
}
