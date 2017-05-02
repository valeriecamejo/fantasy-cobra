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
    'user_id',
    'sport_id',
    'championship_id',
    'name',
    'date_inscription',
    'type_journal',
    'type_play',
    'remaining_salary'
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

public static function future_competitions() {

    $time = ">";
    return $future_competitions = Team_user::team_registered_some_competitions($time);
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
      ->orderBy('competitions.date', 'asc')
      ->get();

    return $team_by_times;
  }

  /***************************************************
   * team_data: Check the information of competitions
                of the user and list of players.
   * @param  $team_id
   * @return $futures_competitions
   ***************************************************/

  public static function team_data($team_id) {

    $competitions = DB::table('competitions')
      ->select('competitions.name', 'competitions.date', 'competitions.entry_cost', 'competitions.enrolled', 'competitions.user_max', 'team_subscribers.points', 'team_subscribers.competition_id', 'team_subscribers.team_user_id', 'competitions.championship_id', 'competitions.sport_id')
      ->join('team_subscribers', 'team_subscribers.competition_id', '=', 'competitions.id')
      ->where('team_subscribers.team_user_id', '=', $team_id)
      ->get();

    $team_information = DB::table('team_subscribers')
      ->select('team_users.remaining_salary', 'competitions.date', 'team_subscribers.points', 'team_users.type_journal', 'team_users.type_play')
      ->join('team_users', 'team_users.id', '=', 'team_subscribers.team_user_id')
      ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
      ->where('team_subscribers.team_user_id', '=', $team_id)
      ->get();

    $players = DB::table('team_user_players')
      ->select('team_users.id', 'team_user_players.name', 'team_user_players.position', 'team_user_players.points')
      ->join('team_users', 'team_users.id', '=', 'team_user_players.team_user_id')
      ->where('team_users.id', '=', $team_id)
      ->orderBy('team_user_players.id', 'asc')
      ->get();

      foreach ($competitions as $competition) {
        $positions = DB::table('team_subscribers')
          ->select('team_subscribers.competition_id', 'team_subscribers.points', 'team_subscribers.team_user_id')
          ->where('team_subscribers.competition_id', '=', $competition->competition_id)
          ->orderBy('team_subscribers.points', 'desc')
          ->get();
        $contador = 1;
        foreach ($positions as $one_position) {
          if ($one_position->team_user_id == $team_id) {
            $competition->position = $contador;
          }
          $contador++;
        }
      }

    $team_data[]         = array(
      'team_information' => $team_information,
      'competitions'     => $competitions,
      'players'          => $players);

    return $team_data;
  }

  /**************************************************
   * update_team: Update a bettor's team.
   * @param  $input
   * @return $team_information
   **************************************************/

  public static function update_team($team_id) {

    $update_team = DB::table('team_user_players')
      ->select('team_user_players.name', 'team_user_players.position', 'players.salary' )
      ->join('players', 'players.id', '=', 'team_user_players.player_id')
      ->where('team_user_id', '=', $team_id)
      ->orderBy('team_user_players.id')
      ->get();

    return $update_team;
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
