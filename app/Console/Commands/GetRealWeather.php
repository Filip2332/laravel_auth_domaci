<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real';

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
        $url = "https://reqres.in/api/users?page=2";
        $response = Http::withoutVerifying()->withHeaders([
            'x-api-key' => 'reqres-free-v1'
        ])->get($url);

        $jsonResponse = $response->body();
        $jsonResponse = json_decode($jsonResponse, true);
        dd($jsonResponse['data'][0]['email']);
    }
}
