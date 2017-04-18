<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use App\Team_user;

class TeamUserController extends Controller
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

  /*********************************************
   * bettor_teams: Gets the user's teams.
   * @param void
   * @return $today_teams
  $previous_teams
  $futures_today
   *********************************************/

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

  public function new_team($type) {
    return view('team.create') ->with('type', $type);
  }

  public function players() {
    $players = Player::players($_GET['championship'],$_GET['type_play']);

    echo json_encode($players);
  }
}
