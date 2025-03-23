<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = 'city';
    protected $fillable = ['name'];
}
