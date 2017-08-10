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
                                              'name'              => "Admin",
                                              'last_name'         => "Admin",
                                              'username'          => "Admin",
                                              'phone'             => "02128000000",
                                              'email'             => "valerie.camejo@condoragency.com",
                                              'status'            => 'ACTIVE',
                                              'dni'               => "20200200",
                                              'date_last_connect' => Carbon::now()->toDateString(),
                                              'ip'                => '192.168.0.1',
                                              'password'          => bcrypt('123456'),
                                              )
                                        ));
  }
}

