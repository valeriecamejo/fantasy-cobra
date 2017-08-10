<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class AdminTableSeeder extends Seeder
{

  public function run()
  {
    $faker = Faker::create();

    DB::table('users')->insert(array (

                                      'user_type_id'      => 1,
                                      'name'              => 'Admin',
                                      'last_name'         => 'Admin',
                                      'username'          => 'admin',
                                      'phone'             => $faker->phoneNumber,
                                      'email'             => 'admin@gmail.com',
                                      'status'            => 'ACTIVE',
                                      'dni'               => $faker->randomnumber,
                                      'date_last_connect' => '2017-03-07 12:00:00',
                                      'ip'                => '192.168.0.1',
                                      'password'          => bcrypt('123456'),

                                      ));
  }
}
