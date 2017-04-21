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
    'user_id', 'sport_id', 'championship_id', 'name', 'date_inscription', 'type_journal', 'type_play', 'remaining_salary'
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


  /**************************************************
   * futures_competitions: List futures competitions
   * @param  $time
   * @return $futures_competitions
   **************************************************/

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


  public static function save_team_turbo($input) {

    $team                   = new Team_user();
    $team->user_id          = Auth::user()->id;
    $team->sport_id         = $input['sport'];
    $team->championship_id  = $input['championship'];
    $team->name             = '';
    $team->date_inscription = Carbon::now()->toDateTimeString();
    $team->type_journal     = $input['type_journal'];
    $team->type_play        = $input['type_play'];
    $team->remaining_salary = $input['salaryrest'];

    if ($team->save()){

      $pa_obj               = Player::find_data($input['PA']);
      $save_pa              = Team_user_players::save_player($pa_obj,$team->id);
      if (!$save_pa) {
        return false;
      }

      $c_obj               = Player::find_data($input['C']);
      $save_c              = Team_user_players::save_player($c_obj,$team->id);
      if (!$save_c) {
        return false;
      }

      $mi_obj              = Player::find_data($input['MI']);
      $save_mi             = Team_user_players::save_player($mi_obj,$team->id);
      if (!$save_mi) {
        return false;
      }

      $ci_obj              = Player::find_data($input['CI']);
      $save_ci             = Team_user_players::save_player($ci_obj,$team->id);
      if (!$save_ci) {
        return false;
      }

      $of_obj               = Player::find_data($input['OF']);
      $save_of              = Team_user_players::save_player($of_obj,$team->id);
      if (!$save_of) {
        return false;
      }

      return $team;
    }
  }

  public static function save_team_regular($input) {

    $team                   = new Team_user();
    $team->user_id          = Auth::user()->id;
    $team->sport_id         = $input['sport'];
    $team->championship_id  = $input['championship'];
    $team->name             = '';
    $team->date_inscription = Carbon::now()->toDateTimeString();
    $team->type_journal     = $input['type_journal'];
    $team->type_play        = $input['type_play'];
    $team->remaining_salary = $input['salaryrest'];

    if ($team->save()){

      $pa_obj               = Player::find_data($input['PA']);
      $save_pa              = Team_user_players::save_player($pa_obj,$team->id);
      if (!$save_pa) {
        return false;
      }

      $c_obj               = Player::find_data($input['C']);
      $save_c              = Team_user_players::save_player($c_obj,$team->id);
      if (!$save_c) {
        return false;
      }

      $fb_obj              = Player::find_data($input['1B']);
      $save_fb             = Team_user_players::save_player($fb_obj,$team->id);
      if (!$save_fb) {
        return false;
      }

      $sb_obj              = Player::find_data($input['2B']);
      $save_sb             = Team_user_players::save_player($sb_obj,$team->id);
      if (!$save_sb) {
        return false;
      }

      $tb_obj              = Player::find_data($input['3B']);
      $save_tb             = Team_user_players::save_player($tb_obj,$team->id);
      if (!$save_tb) {
        return false;
      }

      $ss_obj              = Player::find_data($input['SS']);
      $save_ss            = Team_user_players::save_player($ss_obj,$team->id);
      if (!$save_ss) {
        return false;
      }

      $of_obj               = Player::find_data($input['OF']);
      $save_of              = Team_user_players::save_player($of_obj,$team->id);
      if (!$save_of) {
        return false;
      }

      $of2_obj               = Player::find_data($input['OF1']);
      $save_of2              = Team_user_players::save_player($of2_obj,$team->id);
      if (!$save_of2) {
        return false;
      }

      $of3_obj               = Player::find_data($input['OF2']);
      $save_of3              = Team_user_players::save_player($of3_obj,$team->id);
      if (!$save_of3) {
        return false;
      }

      return $team;
    }
  }
}
