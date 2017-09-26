<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lib\Ddh\UtilityDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Team_Turbo_user extends Team_user {
  protected $table = 'team_users';
  protected $fillable = [
                         'user_id',
                         'sport_id',
                         'championship_id',
                         'name',
                        ];

  static $positions = [
    'C'  => 1,
    'PA' => 1,
    'MI' => 1,  //Middle infield
    'CI' => 1,  //Corner infield
    'OF' => 1,  //outfiled
  ];

  static public function validate_positions ($players) {

    $tmpPositions = array();
    $errors       = array();

    if (is_array($players) || is_object($players)) {

      foreach ($players[0] as $player) {
        if ( ($player->position == '2B') || ($player->position == 'SS') ) {
          $tmpPositions['MI'][] = $player;
        } else {
            if ( ($player->position == '1B') || ($player->position == '3B') ) {
              $tmpPositions['CI'][] = $player;
            } else {
                $tmpPositions[$player->position][] = $player;
            }
        }
      }

      foreach (self::$positions as $position => $qty) {
        if (count($tmpPositions[$position]) !== $qty ) {
          $errors[] = ["Excedio numero de jugadores para la posicion" + $position];
        }
      }
    }
      return (count($errors) > 0 ? $errors : false);
  }
}
