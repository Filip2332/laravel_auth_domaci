<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument('city');


        $response = Http::withoutVerifying()->post("https://api.weatherapi.com/v1/current.json?key=491efb081a074d7a831173013252606&q=$city&aqi=no",);
        $jsonResponse = $response->json();
        if(isset($jsonResponse['error'])){
            $this->output->error($jsonResponse['error']['message']);
        }
            dd($jsonResponse);
    }
}
