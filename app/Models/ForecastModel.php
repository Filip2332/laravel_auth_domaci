<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    protected $table = 'forecast';
    protected $fillable = ['city_id','temerature','forecast_date'];
}
