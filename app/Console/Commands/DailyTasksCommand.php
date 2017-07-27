<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\StatsApi\GamesApi;
use App\StatsApi\PlayersApi;
use App\StatsApi\PlayerStatsApi;
Use App\Player;

class DailyTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description   = 'Performs daily tasks.';
   
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

      $star_date       = '2017-07-14 15:00';
      $end_date        = '2017-08-29 20:00';
      $championship_id = 1;

       PlayersApi::saveUpdatePlayers($championship_id);
       PlayerStatsApi::saveUpdatePlayerStatsApi();
       GamesApi::saveUpdateGames($star_date, $end_date);


        echo "Updated\n";
    }
  }
