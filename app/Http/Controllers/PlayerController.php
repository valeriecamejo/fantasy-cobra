<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team_user_players;
use Illuminate\Http\Request;


class PlayerController extends Controller
{

    public function byJourney($championship, $date)
    {
        $players = Player::byJourney($championship, $date);

        $players_coll = array();

        foreach ($players as $player) {
          $players_coll[$player->position][] = $player;
        }

        return response()->json($players_coll);
    }

    public function playersByTeam($team_id) {

      $team_players      = Team_user_players::playersByTeam($team_id);

      return response()->json($team_players);
    }

}
