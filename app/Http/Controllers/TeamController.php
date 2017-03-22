<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

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

        $today_teams    = Team::today_teams();
        $previous_teams = Team::previous_teams();
        $future_teams  = Team::future_teams();

        $today_competitions    = Team::today_competitions();
        $previous_competitions = Team::previous_competitions();
        $future_competitions  = Team::future_competitions();

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
