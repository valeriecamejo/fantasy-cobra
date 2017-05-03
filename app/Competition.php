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
  ->select('competitions.id', 'competitions.name', 'competitions.cost_guaranteed', 'competitions.type', 'competitions.pot', 'competitions.free', 'competitions.user_max', 'competitions.enrolled', 'competitions.entry_cost', 'competitions.prize_id', 'competitions.date', 'competitions.championship_id', 'competitions.is_important', 'championships.avatar', 'sports.name as name_sport', 'competitions.type_competition', 'competitions.type_play')
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
  ->select('competitions.id', 'competitions.name', 'competitions.cost_guaranteed', 'competitions.type', 'competitions.pot', 'competitions.free', 'competitions.user_max', 'competitions.enrolled', 'competitions.entry_cost', 'competitions.prize_id', 'competitions.date', 'competitions.championship_id', 'competitions.is_important', 'championships.avatar', 'sports.name as name_sport', 'team_subscribers.competition_id', 'competitions.type', 'competitions.type_competition', 'competitions.type_play', 'team_subscribers.team_user_id')
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
    $hour                             = Competition::verify_hour_journal($input['type_journal']);
    $competition->date                = $input['start_date'].' '.$hour;
    $competition->user_max            = $input['max_user'];
    $competition->user_min            = $input['min_user'];
    $competition->prize_guaranteed    = 0;
    $competition->status              = Competition::STATUS_OPEN;
    $competition->entry_cost          = $input['entry_cost'];
    $competition->cost_guaranteed     = 0;
    $competition->description         = '';
    $competition->is_important        = 0;
    $competition->enrolled            = 1;
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
    if ($competition) {
      return $competition;
    } else {
      return false;
    }
  }

  /**
   * modal_competition return data to modal competition
   * @param string $id_competition
   * @return string $competition_data
   */
  public static function modal_competition($id_competition) {

    $competition           = Competition::where('competitions.id', '=', $id_competition)->get();

    foreach ($competition as $competition_info){
      $prize_id           = $competition_info->prize_id;
    }

    $prize                 = Prize::join('prize_types', 'prize_types.prize_id', '=', 'prizes.id')
      ->where('prizes.id', '=', $prize_id)
      ->get();

    $participants          =  User::select('users.name','users.last_name','users.username','team_subscribers.points')
      ->join('team_users', 'team_users.user_id', '=', 'users.id')
      ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
      ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
      ->where('competitions.id', '=', $id_competition)
      ->orderBy('team_subscribers.points', 'DESC')
      ->get();

    $competition_data[]   = array(
      'competition'       => $competition,
      'prize'             => $prize,
      'participants'      => $participants,
    );
    return $competition_data;
  }

  /**
   * verify_hour_journal return hour in relation to type journal
   * @param string $type_journal
   * @return $hour
   */
  private static function verify_hour_journal($type_journal) {
    if ($type_journal == 'DAILY') {
        $hour     ='03:00:00';
        return    $hour;
    } elseif ($type_journal == '3PM') {
      $hour       ='15:00:00';
      return      $hour;
    } elseif ($type_journal == '7PM') {
      $hour       ='19:00:00';
      return      $hour;
    } elseif ($type_journal == 'LONG') {
      $hour       ='15:00:00';
      return      $hour;
    } else {
      return false;
    }
  }


  /**
   * validate_balance_bono
   * @param $cost_entry
   * @return object
   */
  private static function validate_balance_bono($cost_entry) {
    $balance                                  = Auth::user()->bettor->balance;
    $bonus                                    = Auth::user()->bettor->bonus;
    $pay_cost_entry                           = new Team_subscriber();

    if ($cost_entry > $bonus && $bonus != 0) {
      $cost_pay_bonus                         = $cost_entry - $bonus;
      $cost_pay_restant                       = $cost_entry - $cost_pay_bonus;

      if ($cost_pay_restant > $balance) {
        return false;
      } else {
        $cost_pay_balance   = $balance - $cost_pay_restant;

        $pay_cost_entry->balance_before       = $balance;
        $pay_cost_entry->balance_after        = $cost_pay_balance;
        $pay_cost_entry->bonus                = $cost_pay_bonus;
        $pay_cost_entry->balance              = $cost_pay_restant;
      }

    } elseif ($bonus >= $cost_entry) {

      $pay_cost_entry->balance_before       = $balance;
      $pay_cost_entry->balance_after        = 0;
      $pay_cost_entry->bonus                = $cost_entry;
      $pay_cost_entry->balance              = 0;

    } elseif ($balance>= $cost_entry) {

      $pay_cost_entry->balance_before       = $balance;
      $pay_cost_entry->balance_after        = 0;
      $pay_cost_entry->bonus                = $cost_entry;
      $pay_cost_entry->balance              = 0;

    } elseif ($balance < $cost_entry) {
      return false;
    }
  }
}

