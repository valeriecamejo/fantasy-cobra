<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;

class Competition extends Model
{
	protected $table = 'competitions';
	protected $fillable = [
  'tournament_id', 'prize_id', 'sport_id', 'championship_id', 'name', 'type', 'date', 'user_max', 'user_min', 'prize_guaranteed', 'status', 'entry_cost', 'password', 'cost_guaranteed', 'description' , 'start_date', 'end_date', 'pot', 'free', 'is_important', 'enrolled', 'permanent'
  ];

    //CONSTANTES-------------------------------------------------
    const STATUS_OPEN     = 'OPEN';
    const STATUS_PENDING  = 'PENDING';
    const STATUS_FINISHED = 'FINISHED';
    const STATUS_CANCELED = 'CANCELED';

/****************************************************************
 *   Función:     list_competitions                             *
 *   Descripción: Muestra la lista de competiciones en el       *
 *                home, las que están en proceso y las futuras  *
 ****************************************************************/
  public static function list_competitions(){

    $today                = getdate();

    $getutilitydate = UtilityDate::dateAbbrevSpanish($today);

    $list_competitions = \DB::table('competitions')
                      ->select('competitions.id', 'competitions.name', 'competitions.cost_guaranteed', 'competitions.pot', 'competitions.free', 'competitions.user_max', 'competitions.enrolled', 'competitions.entry_cost', 'competitions.prize_id', 'competitions.date', 'competitions.championship_id', 'competitions.is_important', 'championships.avatar')
                      ->join('championships', 'championships.id', '=', 'competitions.championship_id')
                      ->where('competitions.date', '>=' , $today)
                      ->orderBy('competitions.is_important', '=', true, 'asc')
                      ->orderBy('competitions.date', 'asc')
                      ->get();
        return $list_competitions;
    }
  }

