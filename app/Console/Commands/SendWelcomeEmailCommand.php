<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use GuzzleHttp\Client;
use App\StatsApi\TeamsApi;
use App\StatsApi\SportsApi;
use App\StatsApi\PlayersApi;
use App\StatsApi\PositionsApi;
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
    public function handle()
    {
        echo 'hola'. "\n";
        print_r(TeamsApi::saveUpdateTeams());
    }
}
