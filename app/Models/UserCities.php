<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CitiesModel;


class UserCities extends Model
{
    protected $table = 'user_cities';
    protected $fillable = ["user_id", "city_id"];

    public function city()
    {
        return $this->belongsTo(\App\Models\CitiesModel::class, 'city_id');
    }

}
