<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Competition extends Model
{
  protected $table = 'competitions';
  protected $fillable = [
    'prize_id',
    'sport_id',
    'championship_id',
    'name',
    'type',
    'type_journal',
    'type_play',
    'type_competition',
    'date',
    'user_max',
    'user_min',
    'prize_guaranteed',
    'status',
    'entry_cost',
    'password',
    'cost_guaranteed',
    'description' ,
    'end_date',
    'pot',
    'free',
    'is_important',
    'enrolled',
    'permanent'
  ];

//CONSTANTES-------------------------------------------------
  const STATUS_OPEN     = 'OPEN';
  const STATUS_PENDING  = 'PENDING';
  const STATUS_FINISHED = 'FINISHED';
  const STATUS_CANCELED = 'CANCELLED';
  const TYPE_PUBLIC     = 'PUBLIC';
  const TYPE_PRIVATE    = 'PRIVATE';


/*********************************************
* list_competitions: List active competitions
* @param void
* @return $list_competitions
*********************************************/

public static function list_competitions() {

  $today                = date('Y-m-d');

  $list_competitions = DB::table('competitions')
  ->select('competitions.id', 'competitions.name', 'competitions.cost_guaranteed', 'competitions.type', 'competitions.pot', 'competitions.free', 'competitions.user_max', 'competitions.enrolled', 'competitions.entry_cost', 'competitions.prize_id', 'competitions.date', 'competitions.championship_id', 'competitions.is_important', 'championships.avatar', 'sports.name as name_sport')
  ->join('championships', 'championships.id', '=', 'competitions.championship_id')
  ->join('sports', 'sports.id', '=', 'competitions.sport_id')
  ->where('competitions.date', '>=' , $today)
  ->orderBy('competitions.is_important', '=', true, 'asc')
  ->orderBy('competitions.date', 'asc')
  ->get();

  return $list_competitions;
}

/*********************************************
* bettor_competitions: List a user's active
                       competitions
* @param void
* @return $list_competitions
*********************************************/

public static function bettor_competitions() {

  $today                = date('Y-m-d');

  $list_competitions = DB::table('team_subscribers')
  ->select('competitions.id', 'competitions.name', 'competitions.cost_guaranteed', 'competitions.pot', 'competitions.free', 'competitions.user_max', 'competitions.enrolled', 'competitions.entry_cost', 'competitions.prize_id', 'competitions.date', 'competitions.championship_id', 'competitions.is_important', 'championships.avatar', 'team_subscribers.competition_id', 'competitions.type', 'sports.name as name_sport')
  ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
  ->join('championships', 'championships.id', '=', 'competitions.championship_id')
  ->join('team_users', 'team_users.id', '=', 'team_subscribers.team_user_id')
  ->join('sports', 'sports.id', '=', 'team_subscribers.sport_id')
  ->where('team_users.user_id', '=', Auth::user()->id)
  ->where('competitions.date', '>=' , $today)
  ->orderBy('competitions.date', 'asc')
  ->get();

  return $list_competitions;
}
  /**
   * save_competition Post save Competition
   *
   * @param $input
   * @return object $competition
   * @return boolean
   */
  public static function save_competition($input) {

    $competition                      = new Competition();

    $championship                     = Championship::verify_championship($input['sport'],$input['championship']);
    if ($championship){
      $competition->sport_id          = $championship["sport_id"];
      $competition->championship_id   = $championship["id"];
    } else {
      return false;
    }
    $competition->name                = $input['name'];
    $competition->user_id             = Auth::user()->id;
    $competition->date                = Carbon::createFromFormat('d-m-Y', $input['start_date'])
                                        ->toDateTimeString();
    $competition->user_max            = $input['max_user'];
    $competition->user_min            = $input['min_user'];
    $competition->prize_guaranteed    = 0;
    $competition->status              = Competition::STATUS_OPEN;
    $competition->entry_cost          = $input['entry_cost'];
    $competition->cost_guaranteed     = 0;
    $competition->description         = '';
    $competition->is_important        = 0;
    $competition->enrolled            = 0;
    $competition->permanent           = 0;
    $competition->type_journal        = $input['type_journal'];
    $competition->type_play           = $input['type_play'];
    $competition->prize_id            = $input['award'];

    if (isset($input['password'])) {
      $competition->password          = $input['password'];
    }

    if($input['privacy'] == 0) {
      $competition->type                = Competition::TYPE_PUBLIC;
    } elseif ($input['privacy'] == 1){
      $competition->type                = Competition::TYPE_PRIVATE;
    }

    if($input['entry_cost'] == 0) {
      $competition->pot                 = 0;
      $competition->free                = 1;
    } else {
      $competition->pot                 = 1;
      $competition->free                = 0;
    }

    if ($input['max_user'] == 2) {
      $competition->type_competition    = 'H2H';
    }
    if ($competition->save()) {
      return $competition;
    } else {
      return false;
    }
  }
}

