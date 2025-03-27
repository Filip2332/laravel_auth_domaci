<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Http\Request;

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
            'temp' => 'required|numeric',
        ]);

        WeatherModel::create([
            'city' => $request->city,
            'temp' => $request->temp
        ]);

        return redirect()->route('weather.index');
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
