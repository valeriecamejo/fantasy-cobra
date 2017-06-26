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

  $positions = [
    'C'  => 1,
    'PA' => 1,
    'MI' => 2,  //Middle infield
    'CI' => 2,  //Corner infield
    'OF' => 1,  //outfiled
  ];

  static function validate_positions () {
    parent::validate_positions;
  }
}

