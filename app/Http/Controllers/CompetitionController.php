<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\CompetitionRequest;
use Illuminate\Http\Request;
use App\Competition;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    $games    = Game::date_games($sport, $championship);

    if($games) {
      return view('competition.create')
        ->with('sport', $sport)
        ->with('championship',$championship)
        ->with('games',$games);
    } else {
      Session::flash('message', 'No hay juegos disponibles en el calendario para '.$championship);
      Session::flash('class', 'danger');
      return redirect()->back();
    }

  }
  /**
   * save_competition
   */
  public function save_competition(CompetitionRequest $request) {

    $competition     = Competition::save_competition($request->all());

    if ($competition) {
      return Redirect::to('/usuario/crear-equipo/'.$competition->type_play)
        ->cookie('competition', $competition, 20)
        ->cookie('enroll', 'competition', 20);
    } else {
      Session::flash('message', 'Error al intentar crear la competición.');
      Session::flash('class', 'danger');
      return redirect()->back();
    }

  }

  public function modal_competition() {
    $competition = Competition::modal_competition($_GET['id_competition']);

    echo json_encode($competition);
  }

  /**
   * new_team_competition
   * @param $id
   */
  public function new_team_competition($id) {
    $competition    = Competition::find_competition_data($id);
    if ($competition) {
      return Redirect::to('/usuario/crear-equipo/'.$competition->type_play)
        ->cookie('competition', $competition, 20)
        ->cookie('enroll', 'lobby', 20);
    } else {
      Session::flash('message', 'Ha ocurrido un error con la competición.');
      Session::flash('class', 'danger');
      return Redirect::to('lobby');
    }

  }
  /**
   * enroll_team_competition
   * @param $id
   */
  public function enroll_team_competition($id) {
    $competition    = Competition::find_competition_data($id);
    if ($competition) {
      return Redirect::to('usuario/mis-equipos/')
        ->cookie('competition', $competition, 20)
        ->cookie('enroll', 'lobby', 20);
    } else {
      Session::flash('message', 'Ha ocurrido un error con la competición.');
      Session::flash('class', 'danger');
      return Redirect::to('lobby');
    }

  }
  /**
   * competition_details
   */
  public function competitionDetailsOfCookie() {
    $competition_details_cookie  = \Request::cookie('competition');
    if ($competition_details_cookie) {
      echo json_encode($competition_details_cookie);
    } else {
      return false;
    }
  }
}
