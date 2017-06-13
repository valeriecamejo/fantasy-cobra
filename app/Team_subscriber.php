<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Team_subscriber extends Model
{
  protected $table = 'team_subscribers';
  protected $fillable = [
    'sport_id', 'competition_id', 'team_id', 'team_user_id', 'amount', 'points', 'date', 'balance_before', 'balance_after', 'bonus', 'balance', 'is_winner'
  ];

  /**
   * inscription_team inscription team user in competition
   * @param string $team
   * @return $inscription_team
   */
  public static function inscription_team($team) {
    $competition                                = \Request::cookie('competition');
    $type_inscription                           = \Request::cookie('enroll');

    if ($type_inscription == 'competition') {
      $balance                                  = Auth::user()->bettor->balance;
      if ($balance >= $competition->entry_cost) {
        $inscription_team                       = new Team_subscriber();
        $inscription_team->sport_id             = $team->sport_id;
        $inscription_team->competition_id       = $competition->id;
        $inscription_team->team_user_id         = $team->id;
        $inscription_team->amount               = $competition->entry_cost;
        $inscription_team->points               = 0;
        $inscription_team->date                 = $competition->date;
        $inscription_team->balance_before       = $balance;
        $inscription_team->balance_after        = $balance - $competition->entry_cost;
        $inscription_team->balance              = $competition->entry_cost;
        $inscription_team->bonus                = 0;
        $inscription_team->is_winner            = 0;

        $user                                   = Bettor::find(Auth::user()->bettor->id);
        $user->balance                          = $inscription_team->balance_after;
        $user->save();

        if ($inscription_team->save()) {
          return $inscription_team;
        } else {
          return false;
        }

      } else {
        return false;
      }
    } elseif ($type_inscription == 'lobby') {
      $inscription_team                       = new Team_subscriber();
      $inscription_team->sport_id             = $team->sport_id;
      $inscription_team->competition_id       = $competition->id;
      $inscription_team->team_user_id         = $team->id;
      $inscription_team->amount               = $competition->entry_cost;
      $inscription_team->points               = 0;
      $inscription_team->date                 = $competition->date;

      $validate_balance_bonus                 = Competition::validate_balance_bonus($competition->entry_cost);
      if ($validate_balance_bonus) {
        $inscription_team->balance_before       = $validate_balance_bonus['balance_before'];
        $inscription_team->balance_after        = $validate_balance_bonus['balance_after'];
        $inscription_team->balance              = $validate_balance_bonus['balance'];
        $inscription_team->bonus                = $validate_balance_bonus['bonus'];
      } else {
        return false;
      }
      $inscription_team->is_winner            = 0;

      $user                                   = Bettor::find(Auth::user()->bettor->id);
      $user->balance                          = $inscription_team->balance_after;
      $user->save();

      $competition_enrolled                   = Competition::find($competition->id);
      $competition_enrolled->enrolled         = $competition_enrolled->enrolled + 1;
      $competition_enrolled->save();

      if ($inscription_team->save()) {
        return $inscription_team;
      } else {
        return false;
      }

    }

  }
}
