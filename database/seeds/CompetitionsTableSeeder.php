<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CompetitionsTableSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();

    DB::table('competitions')->insert(array(
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 01',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addHour(2)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 1',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     => true,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 02',
                                                  'type'             => 'PUBLIC',
                                                  'date'             => Carbon::now()->addDay(2)->toDateTimeString(),
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => '',
                                                  'user_max'         =>  5,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  1,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  100,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  1000,
                                                  'description'      => 'Competición de Prueba 2',
                                                  'pot'              =>  0,
                                                  'free'             =>  0,
                                                  'is_important'     => false,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 03',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(3)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 3',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 04',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(4)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 4',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 05',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(5)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 5',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 06',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addWeek(1)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 6',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     => true,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 07',
                                                  'type'             => 'PUBLIC',
                                                  'date'             => Carbon::now()->addDay(2)->addWeek(1)->toDateTimeString(),
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => '',
                                                  'user_max'         =>  5,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  1,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  100,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  1000,
                                                  'description'      => 'Competición de Prueba 7',
                                                  'pot'              =>  0,
                                                  'free'             =>  0,
                                                  'is_important'     => false,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 08',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(3)->addWeek(1)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 8',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 09',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(4)->addWeek(1)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 9',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 10',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(5)->addWeek(1)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 10',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 11',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addWeek(2)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 11',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     => true,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 12',
                                                  'type'             => 'PUBLIC',
                                                  'date'             => Carbon::now()->addDay(2)->addWeek(2)->toDateTimeString(),
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => '',
                                                  'user_max'         =>  5,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  1,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  100,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  1000,
                                                  'description'      => 'Competición de Prueba 12',
                                                  'pot'              =>  0,
                                                  'free'             =>  0,
                                                  'is_important'     => false,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 13',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(3)->addWeek(2)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 13',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 14',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(4)->addWeek(2)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 14',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 15',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(5)->addWeek(2)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 15',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 16',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addWeek(3)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 16',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     => true,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 17',
                                                  'type'             => 'PUBLIC',
                                                  'date'             => Carbon::now()->addDay(2)->addWeek(3)->toDateTimeString(),
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => '',
                                                  'user_max'         =>  5,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  1,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  100,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  1000,
                                                  'description'      => 'Competición de Prueba 17',
                                                  'pot'              =>  0,
                                                  'free'             =>  0,
                                                  'is_important'     => false,
                                                  'enrolled'         =>  1,
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 18',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(3)->addWeek(3)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 18',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 19',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(4)->addWeek(3)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 19',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            array(
                                                  'user_id'          =>  1,
                                                  'prize_id'         =>  1,
                                                  'sport_id'         =>  1,
                                                  'championship_id'  =>  1,
                                                  'name'             => 'Competition 20',
                                                  'type'             => 'PUBLIC',
                                                  'type_journal'     => '7PM',
                                                  'type_play'        => 'REGULAR',
                                                  'type_competition' => 'H2H',
                                                  'date'             => Carbon::now()->addDay(5)->addWeek(3)->toDateTimeString(),
                                                  'user_max'         =>  2,
                                                  'user_min'         =>  2,
                                                  'prize_guaranteed' =>  0,
                                                  'status'           => 'OPEN',
                                                  'entry_cost'       =>  0,
                                                  'password'         => '',
                                                  'cost_guaranteed'  =>  0,
                                                  'description'      => 'Competición de Prueba 20',
                                                  'pot'              =>  0,
                                                  'free'             =>  1,
                                                  'is_important'     =>  false,
                                                  'enrolled'         =>  1
                                                  ),
                                            ));
}
}
