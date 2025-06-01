@extends("admin.layout")

@section("content")
    <style>
        body {
            background:
                linear-gradient(rgba(0, 0, 50, 0.6), rgba(0, 0, 50, 0.6)),
                url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1470&q=80') no-repeat center center fixed;
            background-size: cover;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.85);
            color: #333;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
    </style>


    <div class="container py-4">
        <h2 class="mb-4 text-white">Create New Forecast</h2>

        <form method="POST" action="{{ route('forecast.create') }}" class="glass-container">
            @csrf

            <div class="mb-3">
                <label for="city_id" class="form-label">City</label>
                <select name="city_id" class="form-select" id="city_id" required>
                    <option value="">Select a city</option>
                    @foreach(\App\Models\CitiesModel::all() as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>



            <div class="mb-3">
                <label for="temperature" class="form-label">Temperature (°C)</label>
                <input type="text" name="temperature" id="temperature" placeholder="Enter temperature" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="forecast_date" class="form-label">Forecast Date</label>
                <input type="date" name="forecast_date" id="forecast_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="weather_type" class="form-label">Weather Type</label>
                <select name="weather_type" id="weather_type" class="form-select" required>
                    <option value="">Choose weather type</option>
                    <option value="sunny">Sunny ☀️</option>
                    <option value="rainy">Rainy 🌧️</option>
                    <option value="cloudy">Cloudy ☁️</option>
                    <option value="snowy">Snowy ❄️</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="probability" class="form-label">Chance of Rain (%)</label>
                <input type="text" name="probability" id="probability" placeholder="e.g. 60" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Create Forecast</button>
        </form>

        <hr class="my-5">

        <h3 class="text-white">Forecasts by City</h3>
        <div class="forecast-grid">
            @foreach(\App\Models\CitiesModel::all() as $city)
                <div class="glass-container">
                    <h4 class="text-muted">{{ $city->name }}</h4>
                    <ul class="list-group">
                        @foreach($city->forecasts as $forecast)
                            @php
                                $color = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                                $icon = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $forecast->forecast_date }}
                                <span>
                                <i class="{{ $icon }}"></i>
                                <span style="color: {{ $color }};">{{ $forecast->temperature }}&deg;C</span>
                            </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@endsection


