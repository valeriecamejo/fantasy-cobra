<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;

class CompetitionController extends Controller {

/**
* Create a new controller instance.
*
* @return void
*/
    public function __construct()
    {
        $this->middleware('auth');
    }

/**************************************************
* bettor_competitions: Call the appropriate method
                       to list user competitions.
* @param void
* @return $list_competitions
**************************************************/
    public function bettor_competitions(){

        $list_competitions = Competition::bettor_competitions();

        return view('users.competitions', array('list_competitions' => $list_competitions));
    }
}
