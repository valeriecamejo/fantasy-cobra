<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompetitionsTableSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();

    \DB::table('competitions')->insert(array(
      array(
        'user_id'          => '1',
        'prize_id'         => '1',
        'sport_id'         => '1',
        'championship_id'  => '1',
        'name'             => 'First Competition',
        'type'             => 'PUBLIC',
        'type_journal'     => '7PM',
        'type_play'        => 'REGULAR',
        'type_competition' => 'H2H',
        'date'             => '2017-04-30',
        'user_max'         => '2',
        'user_min'         => '2',
        'prize_guaranteed' => '1',
        'status'           => 'OPEN',
        'entry_cost'       => '0',
        'password'         => '',
        'cost_guaranteed'  => '5000',
        'description'      => 'Competición de Prueba 2',
        'pot'              => '0',
        'free'             => '1',
        'is_important'     => true,
        'enrolled'         => '1',
      ),
      array(
        'user_id'          => '1',
        'prize_id'         => '1',
        'sport_id'         => '1',
        'championship_id'  => '2',
        'name'             => 'Second Competition',
        'type'             => 'PUBLIC',
        'date'             => '2017-04-22 19:30:00',
        'type_journal'     => '7PM',
        'type_play'        => 'REGULAR',
        'type_competition' => '',
        'user_max'         => '5',
        'user_min'         => '2',
        'prize_guaranteed' => '1',
        'status'           => 'OPEN',
        'entry_cost'       => '1000',
        'password'         => '',
        'cost_guaranteed'  => '10000',
        'description'      => 'Competición de Prueba 1',
        'pot'              => '0',
        'free'             => '0',
        'is_important'     => false,
        'enrolled'         => '1',
      ),
      array(
        'user_id'          => '2',
        'prize_id'         => '1',
        'sport_id'         => '2',
        'championship_id'  => '3',
        'name'             => 'Free Competition',
        'type'             => 'PUBLIC',
        'type_journal'     => '3PM',
        'type_play'        => 'TURBO',
        'type_competition' => '',
        'date'             => '2017-05-15 19:30:00',
        'user_max'         => '10',
        'user_min'         => '2',
        'prize_guaranteed' => '1',
        'status'           => 'OPEN',
        'entry_cost'       => '0',
        'password'         => '',
        'cost_guaranteed'  => '0',
        'description'      => 'Competición Gratis',
        'pot'              => '1',
        'free'             => '1',
        'is_important'     => false,
        'enrolled'         => '1',
      ),
    ));
  }
}
