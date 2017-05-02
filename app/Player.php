<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Player extends Model
{

  // TODO tomar en cuanta que todo consulta debe estar combinada con el championship

	protected $table = 'players';
	protected $fillable = [
  'team_id', 'sport_id', 'name', 'last_name', 'position', 'salary', 'points', 'status'
  ];

  function less_than_equal_salary($salary) {

  }

  public static function players($championship,$type_play,$date_team, $type_journal){


    $pa         = Player::find_data_params($championship,$type_play,$date_team, $type_journal,'PA');

    $c         = Player::find_data_params($championship,$type_play,$date_team, $type_journal,'C');

    $fb        = Player::find_data_params($championship,$type_play,$date_team, $type_journal,'1B');

    $sb        = Player::find_data_params($championship,$type_play,$date_team, $type_journal,'2B');

    $tb        = Player::find_data_params($championship,$type_play,$date_team, $type_journal,'3B');

    $ss        = Player::find_data_params($championship,$type_play,$date_team, $type_journal,'SS');

    $of        = Player::find_data_params($championship,$type_play,$date_team, $type_journal,'OF');

    $ci        = Player::find_data_params_union($championship,$type_play,$date_team, $type_journal,'3B', '1B');

    $mi        = Player::find_data_params_union($championship,$type_play,$date_team, $type_journal,'SS', '2B');

var_dump($type_play);

    if ($type_play == 'REGULAR') {
      $players[]  = array(
        'pa'      => $pa,
        'c'       => $c,
        'fb'      => $fb,
        'sb'      => $sb,
        'tb'      => $tb,
        'ss'      => $ss,
        'of'      => $of
      );
    } elseif ($type_play == 'TURBO') {
      $players[]  = array(
        'pa'      => $pa,
        'c'       => $c,
        'ci'      => $ci,
        'mi'      => $mi,
        'of'      => $of
      );
    }

    return $players;
  }


  public static function find_data($id) {

    $player = Player::select('players.*','teams.short_nickname as name_team',
      DB::raw('if(players.team_id = games.team_id_home, games.team_id_away, games.team_id_home) as opo'),
      DB::raw('(select teams.short_nickname from teams where teams.id = opo) as name_opponent'))
      ->join('teams', 'teams.id', '=', 'players.team_id')
      ->join('games', function($games) {
        $games->on('games.team_id_home', '=', 'teams.id');
        $games->orOn('games.team_id_away', '=', 'teams.id');
      })
      ->where('players.id', '=', $id)
      ->first();

    return $player;
  }

  public static function find_data_params($championship,$type_play,$date_team, $type_journal,$position) {
    $date       = $date_team;

    $player = Player::select('players.*','teams.short_nickname as name_team',
      DB::raw('if(players.team_id = games.team_id_home, games.team_id_away, games.team_id_home) as opo'),
      DB::raw('(select teams.short_nickname from teams where teams.id = opo) as name_opponent'))
      ->join('teams', 'teams.id', '=', 'players.team_id')
      ->join('games', function($games) {
        $games->on('games.team_id_home', '=', 'teams.id');
        $games->orOn('games.team_id_away', '=', 'teams.id');
      })
      ->where('players.championship_id', '=', $championship)
      ->where(DB::raw('DATE_FORMAT(games.start_date, "%Y-%m-%d")'), '=', $date)
      ->where('players.position', '=', $position)
      ->get();

    return $player;
  }

  public static function find_data_params_union($championship,$type_play,$date_team, $type_journal,$position, $position2) {
    $date       = $date_team;

    $player = Player::select('players.*','teams.short_nickname as name_team',
      DB::raw('if(players.team_id = games.team_id_home, games.team_id_away, games.team_id_home) as opo'),
      DB::raw('(select teams.short_nickname from teams where teams.id = opo) as name_opponent'))
      ->join('teams', 'teams.id', '=', 'players.team_id')
      ->join('games', function($games) {
        $games->on('games.team_id_home', '=', 'teams.id');
        $games->orOn('games.team_id_away', '=', 'teams.id');
      })
      ->where('players.championship_id', '=', $championship)
      ->where(DB::raw('DATE_FORMAT(games.start_date, "%Y-%m-%d")'), '=', $date)
      ->where('players.position', '=', $position);

    $player_union = Player::select('players.*','teams.short_nickname as name_team',
      DB::raw('if(players.team_id = games.team_id_home, games.team_id_away, games.team_id_home) as opo'),
      DB::raw('(select teams.short_nickname from teams where teams.id = opo) as name_opponent'))
      ->join('teams', 'teams.id', '=', 'players.team_id')
      ->join('games', function($games) {
        $games->on('games.team_id_home', '=', 'teams.id');
        $games->orOn('games.team_id_away', '=', 'teams.id');
      })
      ->where('players.championship_id', '=', $championship)
      ->where(DB::raw('DATE_FORMAT(games.start_date, "%Y-%m-%d")'), '=', $date)
      ->where('players.position', '=', $position2)
      ->union($player)
      ->get();

    return $player_union;
  }

}
