<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

    \DB::table('team_users')->insert(array(
      array(
        'user_id'          => '2',
        'sport_id'         => '1',
        'championship_id'  => '1',
        'date_inscription' => '2017-03-14 12:30:00',
        'remaining_salary' => '1000',
        'name'             => 'Prueba 1',
        'type_journal'     => '7PM',
        'type_play'        => 'REGULAR',
      ),
      array(
        'user_id'          => '2',
        'sport_id'         => '2',
        'championship_id'  => '3',
        'date_inscription' => '2017-03-14 12:30:00',
        'remaining_salary' => '2000',
        'name'             => 'Prueba 2',
        'type_journal'     => '3PM',
        'type_play'        => 'REGULAR',
      ),
      array(
        'user_id'          => '4',
        'sport_id'         => '1',
        'championship_id'  => '2',
        'date_inscription' => '2017-03-14 12:30:01',
        'remaining_salary' => '4500',
        'name'             => 'Prueba 3',
        'type_journal'     => '3PM',
        'type_play'        => 'REGULAR',
      ),
    ));
  }
}
