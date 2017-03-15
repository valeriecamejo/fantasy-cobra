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
            'tournament_id'    => '1',
            'prize_id'         => '1',
            'sport_id'         => '1',
            'championship_id'  => '1',
            'name'             => 'First Competition',
            'type'             => 'PUBLIC',
            'date'             => '2017-05-02',
            'user_max'         => '3',
            'user_min'         => '2',
            'prize_guaranteed' => '1',
            'status'           => 'OPEN',
            'entry_cost'       => '500',
            'password'         => '',
            'cost_guaranteed'  => '5000',
            'description'      => 'Competición de Prueba',
            'pot'              => '0',
            'free'             => '0',
            'is_important'     => true,
            'enrolled'         => '0',
            ),
            array(
            'tournament_id'    => '1',
            'prize_id'         => '1',
            'sport_id'         => '1',
            'championship_id'  => '2',
            'name'             => 'Second Competition',
            'type'             => 'PUBLIC',
            'date'             => '2017-03-14 19:30:00',
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
            'enrolled'         => '0',
            ),
            array(
            'tournament_id'    => '1',
            'prize_id'         => '1',
            'sport_id'         => '1',
            'championship_id'  => '3',
            'name'             => 'Free Competition',
            'type'             => 'PUBLIC',
            'date'             => '2017-03-20 19:30:00',
            'user_max'         => '10',
            'user_min'         => '2',
            'prize_guaranteed' => '1',
            'status'           => 'OPEN',
            'entry_cost'       => '0',
            'password'         => '',
            'cost_guaranteed'  => '4000',
            'description'      => 'Competición Gratis',
            'pot'              => '0',
            'free'             => '1',
            'is_important'     => false,
            'enrolled'         => '0',
            ),
        ));
    }
}