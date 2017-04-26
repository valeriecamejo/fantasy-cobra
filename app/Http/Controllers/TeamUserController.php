<?php

namespace App\Http\Controllers;

use App\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Team_user;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TeamUserController extends Controller {

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

    $today_competitions    = Team_user::today_teams();
    $previous_competitions = Team_user::previous_teams();
    $future_competitions  = Team_user::future_teams();

//var_dump($future_competitions);exit();

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
    return view('team.create')
    ->with('type', $type)
    ->with('championship', '1')
    ->with('date', Carbon::now()->format('d-m-Y'));
  }

  public function players() {
    $players = Player::players($_GET['championship'],$_GET['type_play']);

    echo json_encode($players);
  }

  public function save_team() {

    if (Input::get('type_play') == 'TURBO') {
      $team = Team_user::save_team_turbo(Input::all());

    } elseif (Input::get('type_play') == 'REGULAR') {
      $team = Team_user::save_team_regular(Input::all());

    }

    if ($team) {
      Session::flash('message', 'Equipo creado con exito.');
      Session::flash('class', 'success');
      return Redirect::to('usuario/mis-equipos');
    } else {
      Session::flash('message', 'Error al crear el equipo.');
      Session::flash('class', 'danger');
      return redirect()->back();
    }

  }

  /***************************************************
   * team_data: Check the information of competitions
                of the user and list of players.
   * @param  void
   * @return $team_data
   ***************************************************/

  public function team_data() {

    $team_data = Team_user::team_data($_GET['team_id']);
    echo json_encode($team_data);
  }

/***************************************************
   * edit_team: Edit a team
   * @param  void
   * @return $team_data
   ***************************************************/

  public function edit_team() {

    return view('team.edit');
  }

}
