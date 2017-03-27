<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BettorsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

          \DB::table('bettors')->insert(array (
              'user_id'                 => '2',
              'city_id'                 => '1',
              'balance'                 => '10000',
              'url_own'                 => 'www.url_own.com',
              'url_promotional'         => 'www.url_promotional.com'
        ));
    }
}
