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
      Commands\SendWelcomeEmailCommand::class,
      Commands\DailyTasksCommand::class,
      Commands\PlayersPointsCommand::class
    ];
// protected $commands = [
//         \App\Console\Commands\SendWelcomeEmailCommand::class,
//     ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

      $schedule->command('send:welcome')
               ->dailyAt('17:28');

      $schedule->command('task:update')
               ->dailyAt('03:00');

      // $schedule->command('players:point')
      //          ->dailyAt('03:00');
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

