<?php

namespace Database\Seeders;

use App\Models\Weather;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{

    public function run(): void
    {
        $weather = Weather::all();

        foreach ($weather as $data) {
            Weather::create([
            'city' => $data->city,
            'temp' => $data->temp,
                ]);
        }
    }
}

