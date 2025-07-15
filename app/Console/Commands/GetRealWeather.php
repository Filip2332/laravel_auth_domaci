<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

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

        $dbCity = CitiesModel::where(['name' => $city])->first();
        if($dbCity === null){
            $dbCity = CitiesModel::create(['name' => $city]);
        } else {
            $dbCity->load('todaysForecast');
        }
        $this->info("Today is: " . now()->toDateString());

        if ($dbCity->todaysForecast) {
            $this->info("There already is this city in the database " . $dbCity->todaysForecast->forecast_date);
        } else {
            $this->info("There is no todays forecast");
        }

        if($dbCity->todaysForecast !== null){
            $this->output->comment("Command finished");
            return;
        }
        $url = "https://api.weatherapi.com/v1/current.json";
;
        $response = \Illuminate\Support\Facades\Http::withoutVerifying()->get($url, [
            'key' => '491efb081a074d7a831173013252606',
            'q' => $city,
            'aqi' => 'no'
        ]);

        $jsonResponse = $response->body();
        $jsonResponse = json_decode($jsonResponse, true);

        $forecastDate = $jsonResponse['location']['localtime'];
        $temperature = $jsonResponse['current']['temp_c'];
        $weatherType = $jsonResponse['current']['condition']['text'];
        $probability = $jsonResponse['current']['humidity'];


        $forecast = [
            'city_id' => $dbCity->id,
            'temperature' => $temperature,
            'forecast_date' => $forecastDate,
            'weather_type' => $weatherType,
            'probability' => $probability
        ];


        ForecastsModel::create($forecast);
        $this->info("Forecast is saved");

    }
}
