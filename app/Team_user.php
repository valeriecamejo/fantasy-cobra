<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Team_user extends Model {
  protected $table = 'team_users';
  protected $fillable = [
    'user_id', 'sport_id', 'championship_id', 'date_inscription', 'remaining_salary', 'name'
  ];

  /*********************************************
   * today_teams: List today teams
   * @param void
   * @return $today_teams
   *********************************************/
  public static function today_teams() {

    $time = "=";
    return $today_teams = Team_user::team_by_times($time);
  }

  /*********************************************
   * previous_teams: List previous teams
   * @param void
   * @return $previous_teams
   *********************************************/
  public static function previous_teams() {

    $time = "<";
    return $previous_teams = Team_user::team_by_times($time);
  }

  /*********************************************
   * future_teams: List future teams
   * @param void
   * @return $future_teams
   *********************************************/
  public static function future_teams() {

    $time = ">";
    return $previous_teams = Team_user::team_by_times($time);
  }

  /*********************************************
   * today_competitions: List today competitions
   * @param void
   * @return $today_competitions
   *********************************************/
  public static function today_competitions() {

    $time = "=";
    return $today_competitions = Team_user::team_by_times($time);
  }

  /***********************************************
   * previous_competitions: List previous competitions
   * @param void
   * @return $previous_competitions
   ************************************************/
  public static function previous_competitions() {

    $time = "<";
    return $previous_competitions = Team_user::team_by_times($time);
  }

  /**********************************************
   * future_competitions: List futures competitions
   * @param void
   * @return $future_competitions
   ***********************************************/
  public static function future_competitions() {

    $time = ">";
    return $future_competitions = Team_user::team_by_times($time);
  }

  /**********************************************
   * futures_competitions: List futures competitions
   * @param  $time
   * @return $futures_competitions
   ***********************************************/
  private static function team_by_times($time) {

    $today         = date('Y-m-d');

    $team_by_times = DB::table('team_users')
      ->select('team_users.id', 'team_subscribers.points', 'team_users.name', 'team_users.user_id', 'championships.avatar', 'team_users.championship_id', 'competitions.date', 'team_users.remaining_salary', 'team_subscribers.competition_id', 'team_subscribers.team_user_id')
      ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
      ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
      ->join('championships', 'championships.id', '=', 'team_users.championship_id')
      ->where(DB::raw('DATE_FORMAT(competitions.date, "%Y-%m-%d")'), $time, $today)
      ->where('team_users.user_id', '=', Auth::user()->id)
      ->get();
    return $team_by_times;
  }

  public static function save_team($input) {
    $team                   = new Team_user();
    $team->user_id          = Auth::user()->id;
    $team->sport_id         = $input['sport_id'];
    $team->championship_id  = $input['championship_id'];
    $team->name             = $input['name'];
    $team->date_inscription = $input['date_inscription'];
    $team->type_journal     = $input['type_journal'];
    $team->type_play        = $input['type_play'];
    $team->remaining_salary = $input['remaining_salary'];

    if ($team->save()){
      $pa_s                 = Player::find_data($input['PA']);
      $save_pa              = Team_user_players::save_player($pa_s,$team->id);
    }
  }
}
