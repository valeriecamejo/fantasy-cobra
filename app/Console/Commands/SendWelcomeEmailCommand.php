<?php

namespace App\Console\Commands;

use \DateTime;
use App\User;
use App\StatsApi\StatsApi;
use App\StatsApi\GamesApi;
use App\StatsApi\TeamsApi;
use App\StatsApi\SportsApi;
use App\StatsApi\PlayersApi;
use App\StatsApi\PlayerStatsApi;
use App\StatsApi\PositionsApi;
use Illuminate\Console\Command;
use App\StatsApi\ChampionshipsApi;
use App\StatsApi\TournamentsApi;
use App\StatsApi\TournamentGroupsApi;

class SendWelcomeEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:welcome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a welcome email to all new users who joined yesterday.';

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
    public static function handle()
    {

      $route        = 'cronJob';
      $statsWebHook = null;

      $service = 'sports';
      // $jsonApi  = StatsApi::get($service);

      // TournamentsApi::saveUpdateTournaments();
      // TournamentGroupsApi::saveUpdateTournamentGroups();
      // SportsApi::saveUpdateSports();
      // GamesApi::saveUpdateGames();
      // PositionsApi::saveUpdatePositions();
      // TeamsApi::saveUpdateTeams();
      // ChampionshipsApi::saveUpdateChampionships();
      PlayersApi::saveUpdatePlayers();
    }
}
