<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PrizesTableSeeder extends Seeder
{

    public function run()
    {
      $faker = Faker::create();

        \DB::table('prizes')->insert(array(
            array(
            'description'  => 'El ganador se lo lleva todo',
            'active'       => '1',
            'type'         => '1',
            'total_people' => '1'
            ),
            array(
            'description'  => 'Primer y Segundo Lugar',
            'active'       => '1',
            'type'         => '1',
            'total_people' => '2'
            ),
            array(
            'description'  => 'Primer, Segundo y Tercer Lugar',
            'active'       => '1',
            'type'         => '1',
            'total_people' => '3'
            ),
            array(
            'description'  => 'Primeros 5 lugares',
            'active'       => '1',
            'type'         => '1',
            'total_people' => '5'
            ),
            array(
            'description'  => 'Los mejores 10',
            'active'       => '1',
            'type'         => '1',
            'total_people' => '10'
            ),
            array(
            'description'  => 'Top 50',
            'active'       => '1',
            'type'         => '1',
            'total_people' => '50'
        )));
    }
}
