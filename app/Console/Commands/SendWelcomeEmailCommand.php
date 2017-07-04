<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\User;
use GuzzleHttp\Client;
use App\StatsApi\SportApi;

class SendWelcomeEmailCommand extends Command
{





    // Authentication is set in the client.
    /*$request = $digitalOcean->get('droplets');

    // Retrieve the status code of the request.
    $statusCode = $request->getStatusCode();

    // Check that the request is successful.
    if ($statusCode >= 200 && $statusCode < 300) {
        $json = $request->json(); // Returns JSON decoded array of data.
        $xml = $request->xml(); // Returns XML decoded array of data.
        $body = $request->getBody(); // Returns the raw body from the request.
    }*/


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

       $this->users = User::where('name', 'Franz')->get();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->users->each(function($user) {

            echo "\nHola\n\n";

       //send user an email here...

     });

        /*$url_api = 'http://api.detrasdelhome.com/v1/';

        $client = new Client();
        $res = $client->post($url_api . 'sign_in', [
            'json' => ['email' => 'jedkaryd@gmail.com',
                    'password' => '123stats']
        ]);

        echo $res->getStatusCode() . "\n\n";

        echo "access-token => {$res->getHeader('access-token')[0]} \n\n";
        echo "client => {$res->getHeader('client')[0]} \n\n";
        echo "uid => {$res->getHeader('uid')[0]} \n\n";

        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo  "\n\n" . $res->getBody();
        // {"type":"User"...'*/

        //$client_stats = StatsApi::login();

        print_r(SportApi::getAll());

        //print_r($client_stats);

        // Send an asynchronous request.
/*        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
        });
        $promise->wait();*/
    }
}
