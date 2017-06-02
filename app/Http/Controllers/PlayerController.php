<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team_user_players;
use Illuminate\Http\Request;


class PlayerController extends Controller
{

    public function byJourney($championship, $date, $journey)
    {
        $players = Player::byJourney($championship, $date, $journey);

        $players_coll = array();

        foreach ($players as $player) {
          $players_coll[$player->position][] = $player;
        }

        return response()->json($players_coll);
    }

    public function playersByTeam($team_id) {

      $team_players      = Team_user_players::playersByTeam($team_id);
/*
      $team_players_coll = array();

      foreach ($team_players as $team_player) {
        $team_players_coll[$team_player->position][] = $team_player;
      }
*/
      return response()->json($team_players);
    }

}
