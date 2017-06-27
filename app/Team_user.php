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

  static $positions = [
    '1B'  => 1,
    '2B'  => 1,
    '3B'  => 1,
    'C'   => 1,
    'PA'  => 1,
    'SS'  => 1,
    'OF'  => 3,
  ];



/**************************************************
 * validate_positions: Positions validation
 * @param  $input
 * @return $bool
 **************************************************/

  static function validate_positions ($players) {

    $tmpPositions = array();
    $errors       = array();

    if (is_array($players) || is_object($players)) {
      foreach ($players as $player) {
        $tmpPositions[$player->position][] = $player;
      }

      foreach (self::$positions as $position => $qty) {
        if (count($tmpPositions[$position]) !== $qty ) {
          $errors[] = ["Excedio numero de jugadores para la posicion" + $position];
        }
      }
    }
    return (count($errors) > 0 ? $errors : false);
  }


/**************************************************
 * validate_remaining_salary: Positions validation
 * @param  $players
 * @return $bool
 **************************************************/

  static function validate_remaining_salary ($players) {

    $remaining_salary = 0;
    $suma             = 0;
    $errors           = array();

    if (is_array($players) || is_object($players)) {
      foreach ($players as $player) {
        $suma = $suma + $player->salary;
      }
    }
    $errors[]    = ["Excedio el monto del salario para crear equipo"];
    return $suma > \App\Lib\Ddh\SettingVariables::getSettings('players_salary') ? $errors : false;
  }


/**************************************************
 * validate_date: Validation of date of competition
 * @param  $date_competition
 * @return $bool
 **************************************************/

  static function validate_date ($date_competition) {

    $today  = date('Y-m-d H:i');
    $errors = array();

    $errors[] = ["La competicion esta por comenzar. No puede modificar su equipo"];

     return $today > $date_competition ? $errors : false;
  }


public function team_players() {
  return $this->hasMany('App\Team_user_players');
}

/**************************************************
 * teamsUser: List teams user
 * @param  void
 * @return $teamsUser
 **************************************************/

public static function teamsUser() {

  $teamsUser = DB::table('team_users')
    ->select('team_users.id', 'team_subscribers.points', 'competitions.name', 'team_users.user_id', 'championships.avatar', 'team_users.championship_id', 'competitions.date', 'team_users.remaining_salary', 'team_subscribers.competition_id', 'team_subscribers.team_user_id', 'sports.name as name_sport')
    ->join('team_subscribers', 'team_subscribers.team_user_id', '=', 'team_users.id')
    ->join('competitions', 'competitions.id', '=', 'team_subscribers.competition_id')
    ->join('championships', 'championships.id', '=', 'team_users.championship_id')
    ->join('sports', 'sports.id', '=', 'team_users.sport_id')
    ->where('team_users.user_id', '=', Auth::user()->id)
    ->orderBy('competitions.date', 'desc')
    ->get();

  return $teamsUser;
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
    ->select('team_users.id', 'team_user_players.player_id', 'team_user_players.name', 'team_user_players.last_name', 'team_user_players.position', 'team_user_players.points', 'team_user_players.name_opponent', 'team_user_players.salary', 'team_user_players.player_id', 'team_user_players.name_team')
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
    ->select('team_user_players.player_id', 'team_user_players.name', 'team_user_players.position', 'players.salary', 'team_user_players.last_name', 'team_user_players.name_opponent', 'team_user_players.name_team' )
    ->join('players', 'players.id', '=', 'team_user_players.player_id')
    ->where('team_user_id', '=', $team_id)
    ->orderBy('team_user_players.id')
    ->get();

  return $update_team;
}

public function add_players() {
  $tup = new Team_user_players();
  $tup->team_user_id = $this->id;
  $tup->save();

  $this->team_players()->save($tup);

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
