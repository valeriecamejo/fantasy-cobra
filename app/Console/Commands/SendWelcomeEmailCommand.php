<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\User;

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
    private $users = null;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
       parent::__construct();

       $this->users = User::where('name', 'valerie')->get();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->users->each(function($user) {

            echo "Hola Ginito Bello\n";

       //send user an email here...

     });
    }
}
