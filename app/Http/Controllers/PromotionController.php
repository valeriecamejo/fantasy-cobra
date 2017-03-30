<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{

/**************************************************
* list_promotions: List available promotions.
* @param void
* @return $list_promotions
**************************************************/
  protected function list_promotions(){

    $list_promotions = Promotion::list_promotions();

    return view('users.promotions', array('list_promotions' => $list_promotions));
    }
}
