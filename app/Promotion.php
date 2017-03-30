<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Promotion extends Model
{
  protected $table = 'promotions';
	protected $fillable = [
  'user_id', 'name',
  'description', 'cost',
  'photo', 'url',
  'web',
  'active',
  'order',
  'type',
  'min',
  'max',
  'rate',
  'deposit',
  'quantity',
  'code_promotional',
  'affiliate_min',
  'affiliate_max',
  'affiliate_rate',
  'affiliate_deposit',
  'affiliate_quantity',
  'start_date',
  'end_date'
  ];

/**************************************************
* list_promotions: List available promotions.
* @param void
* @return $list_promotions
**************************************************/
  public static function list_promotions(){

    $order           = array(1, 2, 3, 4);
    $list_promotions = DB::table('promotions')
                    ->where('active', '=', '1')
                    ->where('web', '=', '1')
                    ->whereIn('order', $order)
                    ->orderBy('order', 'asc')
                    ->get();
    return $list_promotions;
    }
}
