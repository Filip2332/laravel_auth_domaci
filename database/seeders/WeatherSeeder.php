<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{

    public function run(): void
    {

        $cities = CitiesModel::all();

        foreach ($cities as $city) {
            $userWeather = WeatherModel::where('city_id', $city->id)->first();
            if ($userWeather !== null) {
                $this->command->getOutput()->error("There is already a weather with this id: " . $userWeather->id);
                continue;
            }
            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => rand(1,30)
            ]);
        }
    }
}

