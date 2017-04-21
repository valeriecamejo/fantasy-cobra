<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

  // TODO tomar en cuanta que todo consulta debe estar combinada con el championship

	protected $table = 'players';
	protected $fillable = [
  'team_id', 'sport_id', 'name', 'last_name', 'position', 'salary', 'points', 'status'
  ];

  function less_than_equal_salary($salary) {

  }

  public static function players($championship,$type_play){

    $pa         = Player::where('championship_id', '=', $championship)
      ->where('position', '=', 'PA')
      ->get();

    $c         = Player::where('championship_id', '=', $championship)
      ->where('position', '=', 'C')
      ->get();

    $fb        = Player::where('championship_id', '=', $championship)
      ->where('position', '=', '1B')
      ->get();

    $sb        = Player::where('championship_id', '=', $championship)
      ->where('position', '=', '2B')
      ->get();

    $tb        = Player::where('championship_id', '=', $championship)
      ->where('position', '=', '3B')
      ->get();

    $ss        = Player::where('championship_id', '=', $championship)
      ->where('position', '=', 'SS')
      ->get();

    $of        = Player::where('championship_id', '=', $championship)
      ->where('position', '=', 'OF')
      ->get();

    $tbt       = Player::where('championship_id', '=', $championship)
      ->where('position', '=', '3B');

    $ci        = Player::where('championship_id', '=', $championship)
      ->where('position', '=', '1B')
      ->union($tbt)
      ->get();

    $sst       = Player::where('championship_id', '=', $championship)
      ->where('position', '=', 'SS');

    $mi        = Player::where('championship_id', '=', $championship)
      ->where('position', '=', '2B')
      ->union($sst)
      ->get();

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

    $player = Player::where('id', '=', $id)
      ->first();

    return $player;
  }

}
