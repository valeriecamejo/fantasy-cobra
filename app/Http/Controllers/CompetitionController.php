<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;

class CompetitionController extends Controller {

/**********************************
* Create a new controller instance.
* @param void
* @return void
***********************************/
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
    public function bettor_competitions() {

        $list_competitions = Competition::bettor_competitions();

        return view('users.competitions', array('list_competitions' => $list_competitions));
    }

  /**
   * new_competition .
   * @param string $sport, $championship
   * @return \Illuminate\View\View
   */
  public function new_competition($sport, $championship) {
    return view('competition.create')
      ->with('sport', $sport)
      ->with('championship',$championship);
  }
}
