<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Competition;

class HomeController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */

  public function landing() {

    return view('home.landing');
  }

  public function home() {

    if(isset($_COOKIE['landing'])) {
      if(isset(Auth::user()->user_type_id) && Auth::user()->user_type_id == 2){
        return Redirect::to('afiliado');
      } else {
        $list_competitions = Competition::list_competitions();
        return view('home.home', array('list_competitions' => $list_competitions));
      }
    } else {
      setcookie("landing", 1, time() + 259200);
      return Redirect::to('/landing');
    }
  }

  public function terms_services () {
    return view('footer.terms_services');
  }

  public function politics_privacy () {
    return view('footer.politics_privacy');
  }

  public function rules () {
    return view('footer.rules');
  }

  public function score () {
    return view('footer.score');
  }

  public function how_to_play () {
    return view('footer.how_to_play');
  }

}
