<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function index()
    {
        $weather = Weather::all();
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

        Weather::create([
            'city' => $request->city,
            'temp' => $request->temp
        ]);

        return redirect()->route('weather.index');
    }

    public function edit(Weather $weather)
    {
        return view('edit', compact('weather'));
    }

    public function update(Request $request, Weather $weather)
    {
        $request->validate([
            'city' => 'required|string', // Ispravljeno
            'temp' => 'required|numeric',
        ]);

        $weather->update([
            'city' => $request->city,
            'temp' => $request->temp
        ]);

        return redirect()->route('weather.index');
    }

    public function destroy(Weather $weather)
    {
        $weather->delete();
        return redirect()->route('weather.index');
    }
}
