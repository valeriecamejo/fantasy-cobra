<?php

use Illuminate\Database\Seeder;

class UpdateGamesAndCompetitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(CompetitionsTableSeeder::class);
    	$this->call(GamesTableSeeder::class);
    	$this->call(Team_SubscribersTableSeeder::class);
    }
}
