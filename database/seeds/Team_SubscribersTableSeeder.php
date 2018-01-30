<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class Team_SubscribersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();
    $datenow = Carbon::now()->toDateTimeString();

    DB::table('team_subscribers')->insert(array(
                                                array(
                                                      'sport_id'       => 1,
                                                      'competition_id' => DB::table('competitions')->where('date', '>',$datenow)->inRandomOrder()->value('id'),
                                                      'team_id'        => 1,
                                                      'team_user_id'   => 1,
                                                      'amount'         => 5000,
                                                      'points'         => 0,
                                                      'date'           => '2017-03-14 12:30:01',
                                                      'balance_before' => 10000,
                                                      'balance_after'  => 10000,
                                                      'bonus'          => 1000,
                                                      'balance'        => 11000,
                                                      'is_winner'      => true,
                                                      'created_at'     => Carbon::now()->toDateTimeString(),
                                                      'updated_at'     => Carbon::now()->toDateTimeString()
                                                      ),
                                                array(
                                                      'sport_id'       => 2,
                                                      'competition_id' => DB::table('competitions')->where('date', '>',$datenow)->inRandomOrder()->value('id'),
                                                      'team_id'        => 2,
                                                      'team_user_id'   => 1,
                                                      'amount'         => 2000,
                                                      'points'         => 0,
                                                      'date'           => '2017-03-14 12:30:00',
                                                      'balance_before' => 10000,
                                                      'balance_after'  => 10000,
                                                      'bonus'          => 1000,
                                                      'balance'        => 9500,
                                                      'is_winner'      => false,
                                                      'created_at'     => Carbon::now()->toDateTimeString(),
                                                      'updated_at'     => Carbon::now()->toDateTimeString()
                                                      ),
                                                array(
                                                      'sport_id'       => 1,
                                                      'competition_id' => DB::table('competitions')->where('date', '>',$datenow)->inRandomOrder()->value('id'),
                                                      'team_id'        => 1,
                                                      'team_user_id'   => 1,
                                                      'amount'         => 1000,
                                                      'points'         => 0,
                                                      'date'           => '2017-03-14 12:30:00',
                                                      'balance_before' => 8000,
                                                      'balance_after'  => 10000,
                                                      'bonus'          => 500,
                                                      'balance'        => 7500,
                                                      'is_winner'      => true,
                                                      'created_at'     => Carbon::now()->toDateTimeString(),
                                                      'updated_at'     => Carbon::now()->toDateTimeString()
                                                      ),
                                                ));
  }
}
