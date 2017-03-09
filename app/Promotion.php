<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
  protected $table = 'promotions';
	protected $fillable = [
  'user_id', 'name', 'description', 'cost', 'photo', 'url', 'web', 'active', 'order', 'type', 'min', 'max', 'rate', 'deposit', 'quantity', 'code_promotional', 'affiliate_min', 'affiliate_max', 'affiliate_rate', 'affiliate_deposit', 'affiliate_quantity', 'start_date', 'end_date'
  ];

  /*************************************************
  *   Nombre:      promotion_list                  *
  *   Descripcion: Retorna las promociones activas *
  *   Parametros:  NA                              *
  *************************************************/
  public static function promotion_list(){

    try{
      $order  = array(1, 2, 3, 4);
      $result = DB::table('promotion')
                  ->where('active', '=', '1')
                  ->where('web', '=', '1')
                  ->whereIn('orde', $order)
                  ->orderBy('orde', 'ASC')->get();

      return $result;

    }catch(\Exception $e){

      $errores = New ErrorIncidence();
      $errores->script      = "Promotion";
      $errores->funcion     = "promotion_list";
      $errores->codigo      = $e->getCode();
      $errores->linea       = $e->getLine();
      $errores->descripcion = $e->getMessage();
      $errores->save();

      // Se envía correo a equipo de Fantasy Cobra
      $error_answer =  ErrorIncidence::send_mail('Promotion','promotion_list',$e->getLine(),$e->getMessage());

      return Redirect::to('usuario/error');
        }
    }
}
