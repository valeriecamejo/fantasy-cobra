<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function logout(){
      Auth::logout();
      return view('home.home');
    }

    public function login(){
        return view('home.landing');
    }

    protected function register_successfully(){
      return View::make('users.register_successfully');
    }
}
