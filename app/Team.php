<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
                     ->select('team_users.id', 'team_users.user_id', 'championships.avatar', 'competitions.date', 'team_users.remaining_salary')
                     ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
                     ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
                     ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                     ->where(DB::raw('DATE_FORMAT(competitions.date, "%Y-%m-%d")'), "=", $today)
                     ->where('team_users.user_id', '=', Auth::user()->id)
                     ->get();
        //var_dump($today_teams);exit();
        return $today_teams;
    }

/*********************************************
* previous_teams: List previous teams
* @param void
* @return $previous_teams
*********************************************/
  public static function previous_teams(){

        $today       = date('Y-m-d');

        $previous_teams = DB::table('team_users')
                     ->select('team_users.id', 'team_users.user_id', 'championships.avatar', 'competitions.date', 'team_users.remaining_salary')
                     ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
                     ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
                     ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                     ->where(DB::raw('DATE_FORMAT(competitions.date, "%Y-%m-%d")'), "<", $today)
                     ->where('team_users.user_id', '=', Auth::user()->id)
                     ->get();
        //var_dump($previous_teams);exit();
        return $previous_teams;
    }

/*********************************************
* future_teams: List future teams
* @param void
* @return $future_teams
*********************************************/
    public static function future_teams(){

        $today       = date('Y-m-d');

        $future_teams = DB::table('team_users')
                     ->select('team_users.id', 'team_users.user_id', 'championships.avatar', 'competitions.date', 'team_users.remaining_salary', 'team_subscribers.points', 'team_subscribers.competition_id')
                     ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
                     ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
                     ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                     ->where(DB::raw('DATE_FORMAT(competitions.date, "%Y-%m-%d")'), ">", $today)
                     ->where('team_users.user_id', '=', Auth::user()->id)
                     ->get();
        //var_dump($future_teams);exit();
        return $future_teams;
    }

/*********************************************
* today_competitions: List today competitions
* @param void
* @return $today_competitions
*********************************************/
    public static function today_competitions(){

        $today          = date('Y-m-d');

        $today_competitions = DB::table('team_users')
                            ->select('team_users.id', 'team_subscribers.points', 'team_users.id', 'team_users.name', 'championships.avatar', 'team_users.championship_id', 'team_subscribers.date', 'competitions.date')
                            ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
                            ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
                            ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                            ->where(DB::raw('DATE_FORMAT(competitions.date, "%Y-%m-%d")'), "=", $today)
                            ->where('team_users.user_id', '=', Auth::user()->id)
                            ->get();
//var_dump($today_competitions);exit();
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
                            ->select('team_users.id', 'team_subscribers.points', 'team_users.id', 'team_users.name', 'championships.avatar', 'team_users.championship_id', 'team_subscribers.date', 'competitions.date')
                            ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
                            ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
                            ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                            ->where(DB::raw('DATE_FORMAT(competitions.date, "%Y-%m-%d")'), "<", $today)
                            ->where('team_users.user_id', '=', Auth::user()->id)
                            ->get();
//var_dump($previous_competitions);exit();
        return $previous_competitions;
    }

/**********************************************
* futures_competitions: List futures competitions
* @param void
* @return $futures_competitions
***********************************************/
    public static function future_competitions(){

        $today          = date('Y-m-d');

        $future_competitions = DB::table('team_users')
                            ->select('team_users.id', 'team_subscribers.points', 'team_users.id', 'team_users.name', 'championships.avatar', 'team_users.championship_id', 'team_subscribers.date', 'competitions.date')
                            ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
                            ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
                            ->join('championships', 'championships.id', '=', 'team_users.championship_id')
                            ->where(DB::raw('DATE_FORMAT(competitions.date, "%Y-%m-%d")'), ">", $today)
                            ->where('team_users.user_id', '=', Auth::user()->id)
                            ->get();
//var_dump($futures_competitions);exit();
        return $future_competitions;
    }
}
