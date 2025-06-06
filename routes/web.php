<?php

use App\Http\Controllers\AdminForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/prognoza/',[WeatherController::class,'index']);

Route::resource('weather',WeatherController::class);

Route::get("/forecast/search", [ForecastController::class, 'search'])->name('search');

Route::get("forecasts/{city:name}", [ForecastController::class, 'index' ])->name('forecast.permalink');

Route::view("/admin/weather","admin.weather_index");

Route::post("/admin/weather/update", [AdminWeatherController::class,'update'])->name("weather.update");

Route::view("/admin/forecasts","admin.forecast_index");

Route::post("/admin/forecasts/create",[AdminForecastController::class,'create'])->name("forecast.create");

Route::view('/',"welcome")->name("welcome");

Route::get('/forecast/{cityName}', [ForecastController::class, 'index'])->name('forecast.city');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
