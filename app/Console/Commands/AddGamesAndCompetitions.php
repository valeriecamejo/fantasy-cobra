<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class AddGamesAndCompetitions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'games:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new Games, Competitions and Teams Subscribers to FantasyCobra';

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

        $this->call('db:seed', [
            '--class' => 'UpdateGamesAndCompetitionsSeeder'
        ]);

        $this->info("Games and Competitions were added successfully!");


    }
}
