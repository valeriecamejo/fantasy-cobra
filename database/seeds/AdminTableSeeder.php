<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        \DB::table('users')->insert(array (
            'name'         => 'Admin',
            'last_name'    => 'Admin',
            'username'     => 'admin',
            'phone'        => $faker->phoneNumber,
            'email'        => 'admin@gmail.com',
            'status'       => '1',
            'dni'          => $faker->randomnumber,
            'password'     => bcrypt('123456'),
            'user_type_id' => '1'
        ));
    }
}
