@extends('layout')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Forecast for <strong>{{ $city->name }}</strong></h2>
        @if($sunrise && $sunset)
            <div class="alert alert-info text-center">
                <h4>🌅 Sunrise & 🌇 Sunset</h4>
                <p>Sunrise: <strong>{{ $sunrise }}</strong></p>
                <p>Sunset: <strong>{{ $sunset }}</strong></p>
            </div>
        @endif


    @if($forecasts->isEmpty())
            <div class="alert alert-warning">No forecasts available for this city.</div>
        @else
            <ul class="list-group">
                @foreach($forecasts as $forecast)
                    @php
                        $color = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                        $icon = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);
                    @endphp
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ \Carbon\Carbon::parse($forecast->forecast_date)->format('d M Y') }}</strong>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <i class="{{ $icon }}" style="font-size: 1.4rem;"></i>
                            <span style="color: {{ $color }};">{{ $forecast->temperature }}&deg;C</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('welcome') }}" class="btn btn-secondary mt-4">⬅ Back to Search</a>
    </div>
@endsection
