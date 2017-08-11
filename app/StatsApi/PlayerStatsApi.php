<?php

namespace App\StatsApi;

use DB;
use DateTimeZone;
use DateTime;
use App\Player;
use App\Championship;
use App\Team_subscriber;
use App\Team_user_players;

class PlayerStatsApi extends StatsApi {

/********************************************************
* saveUpdatePlayerStatsApi: Save or update championships
* @param
* @return void
********************************************************/

public static function saveUpdatePlayerStatsApi ( $route, $statsWebHook ) {

  $championships = championship::where('is_active', 1)->get();

  foreach($championships as $championship) {

  if ( $route == 'cronJob' ) {

  $service = 'players/1/tournaments/stats';
  StatsApi::get($service);
  $stats   = json_decode($statsApi);
  } elseif ( $route == 'webHook' ) {
    $stats   = json_decode($statsWebHook);
  }

	$index         = null;
	$updated       = '2017-07-12 15:58:03';
	$pointsForTeam = 0;

  $updated_at    = '2017-07-12 15:58:03';
  $points        = Player_::where('calculated', '1')->get();
  $stats         = json_decode(self::$statsApi);

  if (is_array($stats) || is_object($stats)) {

    foreach($stats[0]->tournament_phases as $tournament_phase) {

      foreach($tournament_phase->tournament_groups as $tournament_group) {

        foreach($tournament_group->player_stats as $player_stat) {

          $player = Player::where('legacy_id', $player_stat->player_id)->first();

          foreach ($points as $point => $valuePoint) {

            if ( $player_stat->stat_id == $valuePoint['legacy_id'] ) {
              $stat_points = $player_stat->quantity * $valuePoint['points'];
              $total_points = $player['points'] + $stat_points;
              $date = new DateTime($player_stat->time);

              Player::where('legacy_id', $player_stat->player_id)
              ->update([
                       'points'              => $total_points,
                       'legacy_stat_request' => $date
                       ]);

              Team_user_players::where('legacy_id', $player_stat->player_id)
              ->update([
                       'points' => $total_points
                       ]);
            }
          }
        }
      }
    }
  }

    PlayerStatsApi::pointsForTeam();
  // }
}

}

/********************************************************
* pointsForTeam: Save points to user's teams
* @param
* @return void
********************************************************/

  public static function pointsForTeam() {

  	$points     = 0;
    $team_users = DB::table('team_user_players')->select('team_user_id')->distinct('team_user_id')->get();

    foreach ($team_users as $team_user) {
      // echo $team_user->team_user_id. "\n";
      $points = Team_user_players::where('team_user_id', $team_user->team_user_id)->sum('points');
      Team_subscriber::where('team_user_id', $team_user->team_user_id)
      ->update([
               'points' => $points
               ]);
    }

  }
}

