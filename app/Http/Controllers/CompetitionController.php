<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetitionRequest;
use Illuminate\Http\Request;
use App\Competition;
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
    return view('competition.create')
      ->with('sport', $sport)
      ->with('championship',$championship);
  }
  /**
   * save_competition
   */
  public function save_competition(CompetitionRequest $request) {

    $competition     = Competition::save_competition($request->all());

    if ($competition){
      Session::flash('message', 'Competición creada con exitosamente.');
      Session::flash('class', 'success');
      return redirect('lobby');
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

}
