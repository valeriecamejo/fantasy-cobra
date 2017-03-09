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
            'name'             => 'MLB',
            'type'             => '0',
            'date'             => '2017-03-02',
            'user_max'         => '3',
            'user_min'         => '2',
            'prize_guaranteed' => '1',
            'status'           => 'OPEN',
            'entry_cost'       => '500',
            'password'         => '',
            'cost_guaranteed'  => '5000',
            'description'      => 'Competición de Prueba',
            'start_date'       => '2017-03-02 19:30:00',
            'end_date'         => '2017-04-02 22:00:00',
            'pot'              => '0',
            'free'             => '0',
            'is_important'     => true,
            'enrolled'         => '0',
            ),
        ));
    }
}
