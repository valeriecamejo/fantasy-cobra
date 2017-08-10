<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
  {
    $faker = Faker::create();

    DB::table('cities')->insert(array(
                                      array(
                                            'country_id'   =>  1,
                                            'name'         => 'Nueva York',
                                            'description'  => 'Descripción',
                                            ),
                                      ));
  }
}
