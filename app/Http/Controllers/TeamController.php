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
    protected function bettor_teams() {

        $today_teams    = Team::today_teams();
        $previous_teams = Team::previous_teams();
        $futures_teams  = Team::futures_teams();

        $today_competitions    = Team::today_competitions();
        $previous_competitions = Team::previous_competitions();
        $futures_competitions  = Team::futures_competitions();

        return view('users.teams', array(
                    'today_teams'           => $today_teams,
                    'previous_teams'        => $previous_teams,
                    'futures_teams'         => $futures_teams,
                    'today_competitions'    => $today_competitions,
                    'previous_competitions' => $previous_competitions,
                    'futures_competitions'  => $futures_competitions
                    ));

    }
}
