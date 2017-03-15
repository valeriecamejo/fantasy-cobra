<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;

class CompetitionController extends Controller{

    public function bettor_competitions(){

        $bettor_competitions = Competition::bettor_competitions();

        return view('usuario/ver-mis-competiciones', array('bettor_competitions' => $bettor_competitions));
    }
}
