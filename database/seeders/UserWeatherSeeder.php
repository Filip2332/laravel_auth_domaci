<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{

    public function run(): void
    {
        $city = $this->command->ask('What is your city?');
        if ($city === null) {
            $this->command->info("You'll need to specify a city first");
        }
        $temp = $this->command->ask('What is your temperature?');
        if ($temp === null) {
            $this->command->info("You'll need to specify a temperature first");
        }


        if (WeatherModel::where('city', $city)->exists()) {
            $this->command->error("City {$city} već postoji. Preskačem dodavanje.");
            return;
        }


        $faker = \Faker\Factory::create();


        $this->command->getOutput()->progressStart(1000);

        $weather = WeatherModel::all();

        foreach ($weather as $data) {
            WeatherModel::create([
                'city' => $city,
                'temp' => $temp
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
