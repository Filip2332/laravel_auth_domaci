@foreach($city->forecasts as $fore)
    <p>Temperature: {{$fore->temperature}}° - Date: {{$fore->forecast_date}}</p>
@endforeach
