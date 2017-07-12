<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
	protected $table = 'games';
	protected $fillable = [
                         'legacy_id',
                         'tournament_id',
                         'tournament_group_id',
                         'team_id_home',
                         'team_id_away',
                         'start_date',
                         'end_date',
                         'score_home',
                         'score_away',
                         'status',
                         'schema_team_home',
                         'schema_team_away',
                         'mvp'
                        ];

  /**
   * date_games Array with non-repeated calendar dates
   * @param string $sport, $championship
   * @return $game_date_no_repeat
   */
  public static function date_games($sport, $championship) {

    $championship_data      = Championship::verify_championship($sport,$championship);
    $date_today             = Carbon::now()->toDateString();

    $games                  = Game::select('games.start_date')
      ->join('tournaments', 'tournaments.id', '=', 'games.tournament_id')
      ->where('tournaments.championship_id', '=', $championship_data["id"])
      ->where(DB::raw('DATE_FORMAT(games.start_date, "%Y-%m-%d")'), '>=', $date_today)
      ->get();

    $game_date = [];

    foreach ($games as $game) {
      array_push($game_date,date("Y-m-d", strtotime($game->start_date)));
    }

    $game_date_no_repeat               = array_unique($game_date);
    return $game_date_no_repeat;
  }
}
