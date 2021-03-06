<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('games')->insert(array(
                                     array(
                                           'legacy_id'             => 1,
                                           'tournament_id'         => 1,
                                           'tournament_group_id'   => 1,
                                           'team_home_id'          => 1,
                                           'team_away_id'          => 2,
                                           'start_date'            => Carbon::now()->toDateTimeString(),
                                           'end_date'              => Carbon::now()->toDateTimeString(),
                                           'score_home'            => 0,
                                           'score_away'            => 0,
                                           'status'                => 'status',
                                           'schema_team_home'      => 'Data de prueba',
                                           'schema_team_away'      => 'Data de prueba',
                                           ),
                                     array(
                                           'legacy_id'             => 2,
                                           'tournament_id'         => 1,
                                           'tournament_group_id'   => 1,
                                           'team_home_id'          => 1,
                                           'team_away_id'          => 2,
                                           'start_date'            => Carbon::now()->addDay(5)->toDateTimeString(),
                                           'end_date'              => Carbon::now()->addDay(5)->toDateTimeString(),
                                           'score_home'            => 0,
                                           'score_away'            => 0,
                                           'status'                => 'status',
                                           'schema_team_home'      => 'Data de prueba',
                                           'schema_team_away'      => 'Data de prueba',
                                           ),
                                     array(
                                           'legacy_id'             => 3,
                                           'tournament_id'         => 1,
                                           'tournament_group_id'   => 1,
                                           'team_home_id'          => 1,
                                           'team_away_id'          => 2,
                                           'start_date'            => Carbon::now()->addDay(15)->toDateTimeString(),
                                           'end_date'              => Carbon::now()->addDay(15)->toDateTimeString(),
                                           'score_home'            => 0,
                                           'score_away'            => 0,
                                           'status'                => 'status',
                                           'schema_team_home'      => 'Data de prueba',
                                           'schema_team_away'      => 'Data de prueba',
                                           ),
                                     array(
                                           'legacy_id'             => 4,
                                           'tournament_id'         => 1,
                                           'tournament_group_id'   => 1,
                                           'team_home_id'          => 1,
                                           'team_away_id'          => 2,
                                           'start_date'            => Carbon::now()->addDay(20)->toDateTimeString(),
                                           'end_date'              => Carbon::now()->addDay(20)->toDateTimeString(),
                                           'score_home'            => 0,
                                           'score_away'            => 0,
                                           'status'                => 'status',
                                           'schema_team_home'      => 'Data de prueba',
                                           'schema_team_away'      => 'Data de prueba',
                                           ),
                                     array(
                                           'legacy_id'             => 5,
                                           'tournament_id'         => 1,
                                           'tournament_group_id'   => 1,
                                           'team_home_id'          => 1,
                                           'team_away_id'          => 2,
                                           'start_date'            => Carbon::now()->addDay(30)->toDateTimeString(),
                                           'end_date'              => Carbon::now()->addDay(30)->toDateTimeString(),
                                           'score_home'            => 0,
                                           'score_away'            => 0,
                                           'status'                => 'status',
                                           'schema_team_home'      => 'Data de prueba',
                                           'schema_team_away'      => 'Data de prueba',
                                           ),
                                     array(
                                           'legacy_id'             => 6,
                                           'tournament_id'         => 1,
                                           'tournament_group_id'   => 1,
                                           'team_home_id'          => 1,
                                           'team_away_id'          => 2,
                                           'start_date'            => Carbon::now()->addDay(40)->toDateTimeString(),
                                           'end_date'              => Carbon::now()->addDay(40)->toDateTimeString(),
                                           'score_home'            => 0,
                                           'score_away'            => 0,
                                           'status'                => 'status',
                                           'schema_team_home'      => 'Data de prueba',
                                           'schema_team_away'      => 'Data de prueba',
                                           )
                                     ));
}
}
