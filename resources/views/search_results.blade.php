@extends("layout")

@section("content")
    <div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
        <div class="w-100" style="max-width: 600px;">
            <div class="bg-white p-5 rounded shadow">
                <h1 class="text-center mb-5 text-dark">Cities & Today's Forecast</h1>

                @foreach($cities as $city)
                    <p class="text-info small">City ID: {{ $city->id ?? 'NEMA ID' }}</p>

                    <div class="d-flex justify-content-between align-items-center p-3 mb-3 bg-light rounded shadow-sm">

                        {{-- Link ka stranici grada --}}
                        <a href="{{ route('forecast.permalink', ['city' => $city->name]) }}"
                           class="d-flex align-items-center gap-2 text-decoration-none text-dark flex-grow-1">
                            <strong>{{ $city->name }}</strong>

                            @if($city->todaysForecast)
                                @php
                                    $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type);
                                @endphp
                                <i class="{{ $icon }}"></i>
                            @else
                                <span class="text-muted fst-italic small">(no forecast)</span>
                            @endif
                        </a>

                        <a href="{{ route('city.favourite', ['city' => $city->id]) }}"
                           class="btn btn-outline-danger btn-sm ms-3 d-flex align-items-center justify-content-center"
                           style="width: 40px; height: 40px;"
                           title="Add to favorites">
                            <i class="fa-solid fa-heart"></i>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection




