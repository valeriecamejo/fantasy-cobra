<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{

  public function run()
  {

    $faker = Faker::create();

    for($i = 0; $i < 20; $i ++){
      DB::table('users')->insert(array (
                                        'user_type_id'      => 3,
                                        'name'              => $faker->firstName,
                                        'last_name'         => $faker->lastName,
                                        'username'          => $faker->userName,
                                        'phone'             => $faker->phoneNumber,
                                        'email'             => $faker->unique()->email,
                                        'status'            => 'ACTIVE',
                                        'dni'               => $faker->randomnumber,
                                        'date_last_connect' => '2017-03-07 12:00:00',
                                        'ip'                => '192.168.0.1',
                                        'password'          => bcrypt('123456'),
                                        ));
    }
  }
}
