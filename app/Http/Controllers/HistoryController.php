<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller {

  /***********************************
* Create a new controller instance.
* @param void
* @return void
***********************************/
  public function __construct() {

    $this->middleware('auth');
  }

  /***********************************
  * history: List the user's history.
  * @param void
  * @return $today_teams
        $previous_teams
        $futures_today
  ***********************************/
  public function history() {

    $all_competitions = History::all_competitions();
    $won_competitions = History::won_competitions();
    $transactions     = History::transactions();

    return view('users.history', array(
                                   'all_competitions' => $all_competitions,
                                   'won_competitions' => $won_competitions,
                                   'transactions'     => $transactions
                                   ));

  }
}
