<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Team extends Model
{
	protected $table = 'teams';
	protected $fillable = [
  'stadium_id', 'name', 'nickname', 'short_nickname', 'logo', 'president', 'coach', 'history'
  ];

/*********************************************
* today_teams: List today teams
* @param void
* @return $today_teams
*********************************************/
    public static function today_teams(){

        $today       = date('Y-m-d');

        $today_teams = DB::table('team_users')
                     ->select('team_users.id', 'team_users.user_id', 'team_users.remaining_salary', 'championships.avatar', 'team_users.championship_id')
                     ->join('team_subscribers', 'team_users.user_id', '=', 'team_subscribers.team_user_id')
                     ->join('championships', 'team_users.championship_id', '=', 'championships.id')
                     ->where('team_users.date_inscription', '=' , $today)
                     ->where('team_users.user_id', '=', Auth::user()->id)
                     ->get();

        return $today_teams;
    }

/*********************************************
* previous_teams: List previous teams
* @param void
* @return $previous_teams
*********************************************/
  public static function previous_teams(){

        $today          = date('Y-m-d');

        $previous_teams = DB::table('team_users')
                        ->select('team_users.id', 'team_users.user_id', 'team_users.remaining_salary', 'championships.avatar', 'team_users.championship_id')
                        ->join('team_subscribers', 'team_users.user_id', '=', 'team_subscribers.team_user_id')
                        ->join('championships', 'team_users.championship_id', '=', 'championships.id')
                        ->where('team_users.date_inscription', '<' , $today)
                        ->where('team_users.user_id', '=', Auth::user()->id)
                        ->get();

        return $previous_teams;
    }

/*********************************************
* futures_teams: List future teams
* @param void
* @return $futures_teams
*********************************************/
    public static function futures_teams(){

        $today          = date('Y-m-d');

        $futures_teams = DB::table('team_users')
                       ->select('team_users.id', 'team_users.user_id', 'team_users.remaining_salary', 'championships.avatar', 'team_users.championship_id')
                       ->join('team_subscribers', 'team_users.user_id', '=', 'team_subscribers.team_user_id')
                       ->join('championships', 'team_users.championship_id', '=', 'championships.id')
                       ->where('team_users.date_inscription', '<' , $today)
                       ->where('team_users.user_id', '=', Auth::user()->id)
                       ->get();

        return $futures_teams;
    }

/*********************************************
* today_competitions: List today competitions
* @param void
* @return $today_competitions
*********************************************/
    public static function today_competitions(){

        $today          = date('Y-m-d');

        $today_competitions = DB::table('team_users')
                        ->select(DB::raw('count(team_users.id) as cant', 'team_users.id', 'team_users.name', 'championships.avatar', 'team_users.championship_id', 'team_subscribers.date', 'team_subscribers.points'))
                        ->join('team_subscribers', 'team_users.user_id', '=', 'team_subscribers.team_user_id')
                        ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                        ->where('team_users.date_inscription', '=', $today)
                        ->where('team_users.user_id', '=', Auth::user()->id)
                        ->get();

        return $today_competitions;
    }

/***********************************************
* previous_competitions: List previous competitions
* @param void
* @return $previous_competitions
************************************************/
    public static function previous_competitions(){

        $today          = date('Y-m-d');

        $previous_competitions = DB::table('team_users')
                               ->select('team_users.id', 'team_users.user_id', 'team_users.name', 'championships.avatar', 'team_users.championship_id', 'team_subscribers.date', 'team_subscribers.points')
                               ->join('team_subscribers', 'team_users.user_id', '=', 'team_subscribers.team_user_id')
                               ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                               ->where('team_users.date_inscription', '<', $today)
                               ->where('team_users.user_id', '=', Auth::user()->id)
                               ->get();

        return $previous_competitions;
    }

/**********************************************
* futures_competitions: List futures competitions
* @param void
* @return $futures_competitions
***********************************************/
    public static function futures_competitions(){

        $today          = date('Y-m-d');

        $futures_competitions = DB::table('team_users')
                               ->select('team_users.id', 'team_users.name', 'championships.avatar', 'team_users.championship_id', 'team_subscribers.date', 'team_subscribers.points')
                               ->join('team_subscribers', 'team_users.user_id', '=', 'team_subscribers.team_user_id')
                               ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                               ->where('team_users.date_inscription', '>' , $today)
                               ->where('team_users.user_id', '=', Auth::user()->id)
                               ->get();

        return $futures_competitions;
    }
}
