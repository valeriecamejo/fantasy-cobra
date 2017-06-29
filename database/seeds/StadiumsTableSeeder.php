<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StadiumsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker::create();

    DB::table('stadiums')->insert(array(
                                        array(
                                              'city_id'     => '1',
                                              'name'        => 'Yankee Stadium',
                                              'capacity'    => '90500',
                                              'image'       => 'images/stadiumyankees.png',
                                              'description' => 'Descripción',
                                              ),
                                        array(
                                              'city_id'     => '1',
                                              'name'        => 'Estadio Santiago Bernabéu',
                                              'capacity'    => '81044',
                                              'image'       => 'images/stadiumRealMadrid.png',
                                              'description' => 'Descripción',
                                              ),
                                        ));
  }
}
