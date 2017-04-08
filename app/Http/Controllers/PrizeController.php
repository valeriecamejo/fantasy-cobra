<?php

namespace App\Http\Controllers;

use App\Prize;
use Illuminate\Http\Request;

class PrizeController extends Controller {

  public function prize_min_user(){

    $prize = Prize::prize_min_user($_GET['min_user']);

    echo json_encode($prize);

  }
}
