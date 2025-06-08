@extends("layout")

@section("content")

    @foreach($cities as $city)
        <p>
            <a href="{{ route('forecast.permalink', ['city' => $city->name]) }}">
                {{ $city->name }}
                @if($city->todaysForecast)
                    @php
                        $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type);
                    @endphp
                    <i class="{{ $icon }}"></i>
                @else
                    <span style="color: gray;">(no forecast)</span>
                @endif
            </a>
        </p>
    @endforeach

@endsection
