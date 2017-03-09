<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SportsTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        \DB::table('sports')->insert(array(
             array(
            'name'         => 'baseball',
            'description'  => 'Deporte de equipo jugado entre dos conjuntos de nueve jugadores cada uno.'
            ),
            array(
            'name'         => 'football',
            'description'  => 'Deporte de equipo jugado entre dos conjuntos de once jugadores cada uno y algunos árbitros que se ocupan de que las normas se cumplan correctamente.'
        )));
    }
}
