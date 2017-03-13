<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function landing()
    {
        return view('home.landing');
    }

    public function lobby()
    {
        if(isset($_COOKIE['landing'])){
            return view('home.home');
        }else{
            setcookie("landing", 1, time() + 259200);
            return Redirect::to('/landing');
        }
    }


}
