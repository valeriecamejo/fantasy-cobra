<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $faker = Faker::create();

    \DB::table('countries')->insert(array(
      array(
        'name'        => 'Estados Unidos',
        'description' => 'Descripción'
      )
    ));

  }
}
