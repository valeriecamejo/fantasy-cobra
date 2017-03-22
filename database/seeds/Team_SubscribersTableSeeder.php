<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

        \DB::table('team_subscribers')->insert(array(
            array(
                'sport_id'       => '1',
                'competition_id' => '2',
                'team_id'        => '1',
                'team_user_id'   => '2',
                'amount'         => '1000',
                'points'         => '0',
                'date'           => '2017-03-14 12:30:00',
                'balance_before' => '10000',
                'bonus'          => '1000',
                'balance'        => '9500',
            ),
            array(
                'sport_id'       => '2',
                'competition_id' => '3',
                'team_id'        => '2',
                'team_user_id'   => '2',
                'amount'         => '1000',
                'points'         => '0',
                'date'           => '2017-03-14 12:30:00',
                'balance_before' => '10000',
                'bonus'          => '1000',
                'balance'        => '9500',
            ),
            array(
                'sport_id'       => '1',
                'competition_id' => '4',
                'team_id'        => '2',
                'team_user_id'   => '2',
                'amount'         => '1000',
                'points'         => '0',
                'date'           => '2017-03-14 12:30:00',
                'balance_before' => '10000',
                'bonus'          => '1000',
                'balance'        => '9500',
            ),
        ));
    }
}
