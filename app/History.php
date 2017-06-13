<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class History extends Model {

    //CONSTANTES-------------------------------------------------
    const STATUS_OPEN     = 'OPEN';
    const STATUS_PENDING  = 'PENDING';
    const STATUS_FINISHED = 'FINISHED';
    const STATUS_CANCELED = 'CANCELLED';

/***********************************
* all_competitions: List the history
                    of competitions
                    of the user.
* @param void
* @return $all_competitions
***********************************/
  public static function all_competitions() {

    $today            = date('Y-m-d');
    $all_competitions = DB::table('competitions')
                      ->select('competitions.status', 'competitions.name', 'competitions.date as competition_date', 'competitions.entry_cost', 'team_subscribers.balance_before', 'competitions.id', 'team_subscribers.team_user_id', 'team_users.id', 'team_subscribers.competition_id', 'team_users.championship_id', 'championships.avatar')
                      ->join('team_subscribers', 'team_subscribers.competition_id', '=', 'competitions.id')
                      ->join('team_users', 'team_users.id', '=', 'team_subscribers.team_user_id')
                      ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                      ->where('team_users.user_id', '=', Auth::user()->id)
                      ->orderBy('competitions.date', 'desc')
                      ->get();

    return $all_competitions;
  }

/****************************************************
* won_competitions: List the history of competitions
                    won of the user.
* @param void
* @return $won_competitions
****************************************************/
  public static function won_competitions() {


    $won_competitions = DB::table('competitions')
                      ->select('competitions.prize_id', 'team_subscribers.amount', 'team_subscribers.balance_before', 'competitions.name', 'competitions.date as competition_date', 'team_subscribers.date', 'competitions.championship_id', 'championships.avatar')
                      ->join('team_subscribers', 'team_subscribers.competition_id', '=', 'competition_id')
                      ->join('team_users', 'team_users.id', '=', 'team_subscribers.team_user_id')
                      ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                      ->where('team_subscribers.is_winner', '=', 1)
                      ->where('team_subscribers.team_user_id', '=', Auth::user()->id)
                      ->orderBy('competitions.date', 'desc')
                      ->get();

    return $won_competitions;
  }

/*************************************************
* transactions: List the history of transactions
                of the user.
* @param void
* @return $transactions
**************************************************/
  public static function transactions() {

    $transactions = DB::table('payments')
                  ->join('bettors', 'bettors.user_id', '=', 'payments.user_id')
                  ->join('users', 'users.id', '=', 'payments.user_id')
                  ->where('users.id', '=', Auth::user()->id)
                  ->where('payments.approved', '=', true)
                  ->orderBy('payments.created_at', 'desc')
                  ->get();

    return $transactions;
  }
}
