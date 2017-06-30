<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Player;

class PointsByPlaysCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play:point';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Modify players points in the database';
    private $players = '';
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
        Player::where('position', 'P')
              ->update(
                       ['position' => 'PA']
                       );

        echo "Updated\n";
    }
  }
