<?php

namespace App\Http\Controllers;

use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class AdminForecastController extends Controller
{
        public function create(Request $request){
            $request->validate([
                "city_id" => "required|exists:cities,id",
                "temperature" => "required",
                "forecast_date" => "required|date",
                "weather_type" => "required",
            ]);
            ForecastsModel::create($request->all());
            return redirect()->back();
        }

}
