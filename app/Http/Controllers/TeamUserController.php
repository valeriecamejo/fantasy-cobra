<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Player;
use App\Team_subscriber;
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

  /**
   * new_team
   * @param string $type
   */
  public function new_team($type) {
    $competition                = \Request::cookie('competition');
    $type_inscription           = \Request::cookie('enroll');

    if ($type_inscription == 'lobby') {

      $validate_enroll    = Competition::validate_enroll($competition->id);
      if ($validate_enroll == false) {
        Session::flash('message', 'La competición ya esta llena.');
        Session::flash('class', 'danger');
        return Redirect::to('lobby');
      }

      $validate_password_competition    = Competition::validate_password_competition($competition->id, $competition->password);
      if ($validate_password_competition == false) {
        Session::flash('message', 'Contraeña incorrecta.');
        Session::flash('class', 'danger');
        return Redirect::to('lobby');
      }

      $validate_balance_bonus     = Competition::validate_balance_bonus($competition->entry_cost);
      if ($validate_balance_bonus == false) {
        Session::flash('message', 'El costo de la entrada supera tu presupuesto.');
        Session::flash('class', 'danger');
        return Redirect::to('lobby');
      }

    } elseif ($type_inscription == 'competition') {

      $validate_balance_bonus     = Competition::validate_balance_bonus($competition->entry_cost);
      if ($validate_balance_bonus == false) {
        Session::flash('message', 'El costo de la entrada supera tu presupuesto.');
        Session::flash('class', 'danger');
        return Redirect::to('lobby');
      }

    }
    return view('team.create')
    ->with('type', $type)
    ->with('type_journal', $competition->type_journal)
    ->with('championship', $competition->championship_id)
    ->with('sport', $competition->sport_id)
    ->with('date', $competition->date);
  }

  /**
   * players return player list from crate team
   */
  public function players() {

    $players = Player::players($_GET['championship'],$_GET['type_play'],$_GET['date_team'],$_GET['type_journal']);

    echo json_encode($players);
  }

  /**
   * save_team save team user
   */
  public function save_team() {
    $competition        = \Request::cookie('competition');
    $type_inscription   = \Request::cookie('enroll');

    if ($type_inscription == 'competition') {
      $competition->save();
      $cookie = cookie('competition', $competition, 20);
    }

    if (Input::get('type_play') == 'TURBO') {
      $team                 = Team_user::save_team_turbo(Input::all());
    } elseif (Input::get('type_play') == 'REGULAR') {
      $team                 = Team_user::save_team_regular(Input::all());
    }

    if ($team) {
      $team_subscriber      = Team_subscriber::inscription_team($team);

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
   * edit_team: View for edit a team
   * @param  void
   * @return view('team.edit')
   ***************************************************/

  public function edit_team() {

    $team_date = Carbon::createFromFormat('Y-m-d H:i', input::get('team_date'))->format('d-m-Y');


    return view('team.edit')
         ->with('type_play', input::get('type_play'))
         ->with('championship', input::get('championship_id'))
         ->with('team_date', input::get('team_date'))
         ->with('team_date', $team_date)
         ->with('type_journal', input::get('type_journal'))
         ->with('sport_id', input::get('sport_id'));
  }

  /***************************************************
   * update_team: Update a team
   * @param  void
   * @return $team_information
   ***************************************************/

  public function update_team() {

    $update_team = Team_user::update_team(Input::all());
    $players   = Player::players(input::get('championship_id'), input::get('type_play'), input::get('team_date'), input::get('type_journal'));

    $team_information[]  = array(
      'update_team'      => $update_team,
      'players'          => $players);

    echo json_encode($team_information);

  }

}
