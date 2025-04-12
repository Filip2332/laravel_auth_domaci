<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get('city');
        $cities = CitiesModel::where("name" , "LIKE", "%{$cityName}%")->get();

        if(count($cities) == 0){
            return redirect()->back()->with("error", "Error,city not found");
        }
    }
}
