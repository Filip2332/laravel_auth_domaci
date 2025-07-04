<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get('city');
        $cities = CitiesModel::with("todaysForecast")->where("name", "LIKE", "%{$cityName}%")->get();

        if(count ($cities) == 0) {
            return redirect()->back()->with("Error,there is no city with that name");
        }

        $userFavourites = [];
        if(Auth::check()) {
            $userFavourites = Auth::user()->cityFavourites;
            $userFavourites = $userFavourites->pluck('city_id')->toArray();
        }

        return view("search_results",compact("cities","userFavourites"));
    }

    public function index($cityName)
    {
        $city = \App\Models\CitiesModel::where('name', $cityName)->first();

        if (!$city) {
            return view('forecast.error', ['city' => $cityName]);
        }

        $forecasts = $city->forecasts;

        return view('index', compact('city', 'forecasts'));
    }

}
