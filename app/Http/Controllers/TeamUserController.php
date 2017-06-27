<?php
namespace App\Http\Controllers;
use App\Competition;
use App\Player;
use App\Team_subscriber;
use App\Bettor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Team_user;
use App\Team_Turbo_user;
use App\Team_user_players;
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
   * bettor_teams: Gets the user's view.
   * @param void
   * @return view
   *********************************************/
  public function bettor_teams() {

    return view('users.teams');
  }

  /*********************************************
 * teams_by_user: Gets the user's teams.
 * @param void
 * @return $teamsUser
   *********************************************/
  public function teams_by_user() {

    $teamsUser = Team_user::teamsUser();

    echo json_encode($teamsUser);
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

  /*********************************************
 * save_team: save team user.
 * @param void
 * @return $message
   *********************************************/

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
   * show_team: View for edit a team
   * @param  void
   * @return view('team.edit')
   ***************************************************/

  public function show_team() {

    $team_date = Carbon::createFromFormat('Y-m-d H:i', input::get('team_date'))->format('Y-m-d');

    return view('team.edit')
         ->with('team_date', $team_date);
  }

  /***************************************************
   * update_team_players: Update a team
   * @param  void
   * @return $team_information
   ***************************************************/

  public function update_team_players() {

    $update_team = Team_user::update_team($_GET['team_id']);
    $players     = Player::players($_GET['championship_id'], $_GET['type_play'], $_GET['team_date'], $_GET['type_journal']);
    $team_information[]  = array(
                                'update_team' => $update_team,
                                'players'     => $players
                                );
    echo json_encode($team_information);
  }

  /***************************************************
   * save_team_edited: save user edited team
   * @param  void
   * @return $team_information
   ***************************************************/

  public function save_team_edited(Request $request) {

    $myPlayers = json_decode($request['myPlayers']);
    $team_data = json_decode($request['team_data']);

    if ($team_data->type_play == 'REGULAR') {
      $validate_positions     = Team_user::validate_positions($myPlayers);
    } elseif ($team_data->type_play == 'TURBO') {
      $validate_positions     = Team_Turbo_user::validate_positions($myPlayers);
    }

    $validate_remaining_salary = Team_user::validate_remaining_salary($myPlayers);
    $validate_date             = Team_user::validate_date($team_data->team_date);

    if ( ($validate_positions && $validate_remaining_salary && $validate_date) == false ) {
      $save_team_edited = Team_user_players::save_team_edited($myPlayers, $team_data->team_id);

      if ($save_team_edited == true) {
        Session::flash('message', 'Equipo modificado con exito.');
        Session::flash('class', 'success');
        return Redirect::to('usuario/mis-equipos');
      } else {
        Session::flash('message', 'Error al modificar equipo.');
        Session::flash('class', 'danger');
        return Redirect::to('usuario/mis-equipos');
      }
    }

  }

}
