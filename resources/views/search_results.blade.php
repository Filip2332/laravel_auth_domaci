@extends("layout")

@section("content")
    <div class="min-vh-100 d-flex justify-content-center align-items-center bg-light">
        <div class="w-100" style="max-width: 600px;">
            <div class="bg-white p-5 rounded shadow">

                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <div class="alert alert-danger d-flex flex-column align-items-center text-center">
                        <p class="mb-3">{{ \Illuminate\Support\Facades\Session::get('error') }}</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                @endif

                <h1 class="text-center mb-5 text-dark">Cities & Today's Forecast</h1>

                @foreach($cities as $city)
                    <div class="d-flex justify-content-between align-items-center p-3 mb-3 bg-light rounded shadow-sm">

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

                        <a href="{{ route('city.unfavourite', ['city' => $city->id]) }}"
                           class="btn btn-outline-light btn-sm ms-3 d-flex align-items-center justify-content-center"
                           style="width: 40px; height: 40px;"
                           title="{{ in_array($city->id, $userFavourites) ? 'Remove from favorites' : 'Add to favorites' }}">
                            @if(in_array($city->id, $userFavourites))
                                <i class="fa-solid fa-trash"></i>
                            @else
                                <i class="fa-regular fa-heart text-muted"></i>
                            @endif
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection





