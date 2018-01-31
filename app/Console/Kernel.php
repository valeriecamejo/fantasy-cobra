<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
      Commands\TaskSchedulingCommand::class,
      Commands\DailyTasksCommand::class,
      Commands\PlayersPointsCommand::class,
      Commands\AddGamesAndCompetitions::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

      // $schedule->command('task:scheduling')
      //          ->dailyAt('15:50');

      $schedule->command('task:update')
               ->dailyAt('03:00');

      $schedule->command('games:add')
               ->monthly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
      require base_path('routes/console.php');
    }
  }

