<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;
use App\Models\Weather;


class WeatherController extends Controller
{
    public function index()
    {
        $weather = WeatherModel::all();
        return view('weather', compact('weather'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
            'temperature' => 'required|numeric',
            'city_id' => 'required|integer',
        ]);

        Weather::create([
            'city' => $request->city,
            'temperature' => $request->temperature,
            'city_id' => $request->city_id,
        ]);

        return redirect()->back()->with('success', 'Uspešno sačuvano!');
    }



    public function edit(WeatherModel $weather)
    {
        return view('edit', compact('weather'));
    }

    public function update(Request $request, WeatherModel $weather)
    {
        $request->validate([
            'city' => 'required|string',
            'temp' => 'required|numeric',
        ]);

        $weather->update([
            'city' => $request->city,
            'temp' => $request->temp
        ]);

        return redirect()->route('weather.index');
    }

    public function destroy(WeatherModel $weather)
    {
        $weather->delete();
        return redirect()->route('weather.index');
    }
}
