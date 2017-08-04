<?php

namespace App\StatsApi;

Use DB;
Use App\Player;
Use App\Tournament;
Use App\Position;

class PlayersApi extends StatsApi {

/********************************************
* saveUpdatePlayers: Save or Update a player
* @param void
* @return void
********************************************/

  public static function saveUpdatePlayers () {

    //TO DO
    //****************************************
    //Sustituir '$update_at' por el del API
    //Solicitar para la consulta:
    //   -Status del player
    //****************************************

  $tournaments = DB::table('tournaments')->get();

    foreach($tournaments as $tournament) {

      $tournament_legacy_id = $tournament->legacy_id;
      $service              = 'tournaments/'. $tournament_legacy_id . '/players';
      $jsonApi              = StatsApi::get($service);
      $playerStatsApis      = json_decode($jsonApi);
      $updated_at           = '2017-07-12 15:58:03';
      $players              = DB::table('players')->get();

      if (is_array($playerStatsApis) || is_object($playerStatsApis)) {
        foreach( $playerStatsApis as $championship ) {
// echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>". $playerStatsApis[0]->{'id'};
          foreach ($championship->tournament_teams as $tournament_teams) {
                foreach ($tournament_teams->player_tournament_teams as $player) {

                  $player = $player->player;

                  echo "\n player =====>  {$player->name}\n";
                }
          }

/*          echo "\nid ========> " . print_r($playerStatsApi->tournament_id,true) . "\n";
          foreach( $playerStatsApi->player_tournament_teams as $playerStat ) {


echo "\nplayer ==========> {$playerStat->player_id}\n";*/
//             $position = Position::select('name')->where('legacy_id', $playerStat->player->{"position_id"})->first();
//             $contador = 0;
// echo $position->name;
            // foreach( $players as $player ) {
            //   if ( $player->legacy_id == $playerStat->player->{"id"} ) { //&& ($player->legacy_stat_request < $updated_at) ) {
            //       $contador = 1;
            //       $position = Position::select('name')
            //                 ->where('legacy_id', $playerStat->player->{"position_id"})
            //                 ->get();

            //       DB::table('players')
            //       ->where( 'legacy_id', $playerStat->player->{"id"} )
            //       ->update([
            //        'team_id'             => $playerStat->player->{"team_id"},
            //        'championship_id'     => $playerStatsApis->championship_id,
            //        'name'                => $playerStat->player->{"name"},
            //        'last_name'           => $playerStat->player->{"last_name"},
            //        'position'            => $position->name,
            //        'legacy_stat_request' => $updated_at
            //        ]);
            //     }
            // }
            //   if ($contador == 0) {

            //     $player                      =  new Player();
            //     $player->team_id             =  $playerStat->player->{"team_id"};
            //     $player->championship_id     =  $playerStatsApis->championship_id;
            //     $player->legacy_id           =  $playerStat->player->{"id"};
            //     $player->name                =  $playerStat->player->{"name"};
            //     $player->last_name           =  $playerStat->player->{"last_name"};
            //     $player->points              =  0;
            //     $player->position            =  $position->name;
            //     $player->status              =  1;
            //     $player->legacy_stat_request =  $updated_at;
            //     $player->save();
            //   }
/*          }*/
        }
      }
    }
  }
}

