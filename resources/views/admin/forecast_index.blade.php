<form method="post" action="{{route("forecast.create")}}">
    {{csrf_field()}}
    <input type="text" name="temperature" placeholder="Enter the temperature">
    <input type="date" name="forecast_date" placeholder="Pick a date">
    <select name="weather_type">
        @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
            <option>{{$weather}}</option>
        @endforeach
    </select>
    <input type="text" name="probability" placeholder="Chances for rain">
    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{$city->id}}"> {{$city->name}} </option>
        @endforeach
    </select>
    <button>Create</button>
</form>


@foreach(\App\Models\CitiesModel::all() as $city)
    <h4>{{$city->name}}</h4>
    <ul>
        @foreach($city->forecasts as $forecast)
            <li>{{$forecast->forecast_date}} - {{$forecast->temperature}}</li>

        @endforeach
    </ul>
@endforeach
