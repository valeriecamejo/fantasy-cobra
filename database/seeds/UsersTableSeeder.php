<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{

  public function run() {

    // $faker = Faker::create();

    // for($i = 0; $i < 1; $i ++){
      DB::table('users')->insert(array (
                                        array(
                                              'user_type_id'      => 3,
                                              'name'              => "User",
                                              'last_name'         => "Test",
                                              'username'          => "testuser",
                                              'phone'             => "02128000000",
                                              'email'             => "development@condoragency.com",
                                              'status'            => 'ACTIVE',
                                              'dni'               => "20200200",
                                              'date_last_connect' => Carbon::now()->toDateString(),
                                              'ip'                => '192.168.0.1',
                                              'password'          => bcrypt('123456'),
                                              )
                                        ));
  }
}

