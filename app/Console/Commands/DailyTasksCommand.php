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
    protected $description = 'Performs daily tasks.';
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
    public static function handle() {

      $route           = 'cronJob';
      $statsWebHook    = null;

       PlayersApi::saveUpdatePlayers();
       PlayerStatsApi::saveUpdatePlayerStatsApi( $route, $statsWebHook );
       GamesApi::saveUpdateGames();
    }
  }
