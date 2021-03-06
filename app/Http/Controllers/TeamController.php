<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team_user;

class TeamController extends Controller
{

/***********************************
* Create a new controller instance.
* @param void
* @return void
***********************************/
    public function __construct()
    {
        $this->middleware('auth');
    }

/***********************************
* Create a new controller instance.
* @param void
* @return $today_teams
          $previous_teams
          $futures_today
***********************************/
    public function bettor_teams() {

        $today_teams    = Team_user::today_teams();
        $previous_teams = Team_user::previous_teams();
        $future_teams   = Team_user::future_teams();

        $today_competitions    = Team_user::today_competitions();
        $previous_competitions = Team_user::previous_competitions();
        $future_competitions  = Team_user::future_competitions();

        return view('users.teams', array(
                    'today_teams'           => $today_teams,
                    'previous_teams'        => $previous_teams,
                    'future_teams'          => $future_teams,
                    'today_competitions'    => $today_competitions,
                    'previous_competitions' => $previous_competitions,
                    'future_competitions'   => $future_competitions
                    ));
    }

    public function enroll_team() {


        return view();
    }

}
