<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
  /********************************************************
  *   Function: list_promotions                            *
  *   Descripción: Funcion que redirecciona a la vista de *
  *                lista de promociones                   *
  *   Parametros de entrada: NA                           *
  ********************************************************/
  protected function list_promotions(){

    $type       = Auth::user()->user_type_id;
    $user_id    = Auth::user()->id;

    Bettor::get_actual_balance($type,$user_id);

    //Busca las promociones activas y visibles
    try{
    $promotion_list = Promotion::promotion_list();
    return View::make('bettor/list_promotions')->with('promotion_list', $promotion_list);

  }catch(\Exception $e){

    $errores = New ErrorIncidence();
    $errores->script      = "PromotionController";
    $errores->funcion     = "list_promotion";
    $errores->codigo      = $e->getCode();
    $errores->linea       = $e->getLine();
    $errores->descripcion = $e->getMessage();
    $errores->save();

            return Redirect::to('usuario/error');
        }
    }
}
