<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $this->call(UserTypesTableSeeder::class);
    // $this->call(AdminTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    // $this->call(SportsTableSeeder::class);
    $this->call(PrizesTableSeeder::class);
    // $this->call(ChampionshipsTableSeeder::class);
    // $this->call(TournamentsTableSeeder::class);
    // $this->call(CompetitionsTableSeeder::class);
    $this->call(SettingsTableSeeder::class);
    $this->call(CountriesTableSeeder::class);
    $this->call(CitiesTableSeeder::class);
    $this->call(StadiumsTableSeeder::class);
   // $this->call(Team_UsersTableSeeder::class);
    $this->call(TeamsTableSeeder::class);
  //  $this->call(Team_SubscribersTableSeeder::class);
    $this->call(BettorsTableSeeder::class);
    $this->call(PromotionsTableSeeder::class);
    $this->call(PlayersTableSeeder::class);
    $this->call(Prize_typeTableSeeder::class);
   // $this->call(Team_User_PlayersTableSeeder::class);
   // $this->call(Tournament_GroupsTableSeeder::class);
    $this->call(GamesTableSeeder::class);
    $this->call(Stats_PlayersTableSeeder::class);
    $this->call(PositionsTableSeeder::class);

  }
}
