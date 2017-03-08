<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BettorController extends Controller
{

    /********************************************************
    *   Funcion: home                                       *
    *   Descripción: Funcion que redirecciona al home del   *
    *                bettor(apostador).                     *
    *   Parametros de entrada: NA                           *
    ********************************************************/

    public static function home(){

      if (Auth::check()) {
        return Redirect::to('/lobby');
      }
    }
}
