<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Competition;

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

    public function landing(){

        return view('home.landing');
    }

    public function home(){

        $list_competitions = Competition::list_competitions();

        Log::info("count list_competitions = " . count($list_competitions));

        return view('home.home', array('list_competitions' => $list_competitions));
    }


}
