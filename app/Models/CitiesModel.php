<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class CitiesModel extends Model
{
    protected $table = 'cities';
    protected $fillable = ['city'];

    public function forecasts(){
        return $this->hasMany(ForecastsModel::class, 'city_id','id')
            ->orderBy("forecast_date");
    }

    public function todaysForecast(){
        return $this->hasOne(ForecastsModel::class, 'city_id','id')
            ->whereDate('forecast_date',  Carbon::now());
    }

}
