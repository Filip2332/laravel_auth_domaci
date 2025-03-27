<?php

namespace App\Http\Controllers;

class ForecastController extends Controller
{
    public function index($city){

        $forecast = [
          "beograd" => [22,41,23],
          "cuprija" => [12,5,23],
        ];
        $city = strtolower($city);

        if(!array_key_exists($city, $forecast)){
         die("Ovaj grad ne postoji");
        }

        dd($forecast[$city]);

    }
}
