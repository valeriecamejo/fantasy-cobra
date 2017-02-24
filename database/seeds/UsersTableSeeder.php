<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

      $faker = Faker::create();

      for($i = 0; $i < 20; $i ++){
        \DB::table('users')->insert(array (
            'name'         => $faker->firstName,
            'last_name'    => $faker->lastName,
            'username'     => $faker->userName,
            'phone'        => $faker->phoneNumber,
            'email'        => $faker->unique()->email,
            'status'       => '1',
            'dni'          => $faker->randomnumber,
            'password'     => bcrypt('123456'),
            'user_type_id' => '3'
        ));
      }
    }
}
