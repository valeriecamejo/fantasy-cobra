<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class Team_UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();

    DB::table('team_users')->insert(array(
                                          array(
                                                'user_id'          => DB::table('users')->where('user_type_id',3)->value('id'),
                                                'sport_id'         => '1',
                                                'championship_id'  => '1',
                                                'date_inscription' => Carbon::now()->toDateTimeString(),
                                                'remaining_salary' => '5000',
                                                'name'             => 'Prueba 1',
                                                'type_journal'     => '7PM',
                                                'type_play'        => 'REGULAR',
                                                )
                                          ));
  }
}
