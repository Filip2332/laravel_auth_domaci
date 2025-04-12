@extends("admin.layout")

@section("content")

    <form method="post" action="{{route("forecast.create")}}">
        {{csrf_field()}}
        <div class="mb-3">
            <select name="city_id" class="form-select">
                @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
                    <option>{{$weather}}</option>
                @endforeach
            </select>
        </div>
        <input type="text" name="temperature" placeholder="Enter the temperature">
        <input type="date" name="forecast_date" placeholder="Pick a date">

        <div class="mb-3">
            <input type="text" name="probability" placeholder="Chances for rain">
        </div>

        <div class="mb-3">
            <select name="city_id" form="form-select">
                @foreach(\App\Models\CitiesModel::all() as $city)
                    <option value="{{$city->id}}"> {{$city->name}} </option>
                @endforeach
            </select>
            <button>Create</button>
        </div>

    </form>


    @foreach(\App\Models\CitiesModel::all() as $city)
        <h4>{{$city->name}}</h4>
        <ul>
            @foreach($city->forecasts as $forecast)

                @php
                    $boja = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                    $icon = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type)@endphp
                <li>{{$forecast->forecast_date}} -
                    <i class="{{ $icon }}"></i>
                    <span style="color: {{$boja}};">{{$forecast->temperature}}</span></li>

            @endforeach
        </ul>
    @endforeach

@endsection

<i class="fa-solid fa-sun"></i>
<i class="fa-solid fa-cloud-rain"></i>
<i class="fa-solid fa-snowflake"></i>
<i class="fa-solid fa-cloud-sun"></i>
<i class="{{ trim($icon) }}"></i>


