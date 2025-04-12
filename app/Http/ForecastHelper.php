<?php

namespace App\Http;

class ForecastHelper
{

    public static function getIconByWeatherType($type)
    {
        $prefix = "fa-solid"; // dodao prefix

        if ($type === 'rainy') {
            $icon = "fa-cloud-rain";
        } else if ($type === 'snowy') {
            $icon = "fa-snowflake";
        } else if ($type === 'sunny') {
            $icon = "fa-sun";
        } else if ($type === 'cloudy') {
            $icon = "fa-cloud-sun";
        }
        else {
            $icon = "fa-question";
        }

        return $prefix . ' ' . $icon;
    }

    public static function getColorByTemperature($temperature){
            if($temperature <= 0){
                $boja = "lightblue";
            } else if($temperature >= 1 && $temperature <=15){
                $boja = "blue";
            } else if($temperature > 15 && $temperature <=25){
                $boja = "green";
            } else {
                $boja = "red";
            }
            return $boja;
        }

}
