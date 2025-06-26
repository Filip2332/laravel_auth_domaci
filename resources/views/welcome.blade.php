@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("content")
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Your favourite cities</h3>

        <div class="row justify-content-center">
            @foreach($userFavourites as $userFavourite)
                @php
                    $city = $userFavourite->city;
                    $forecast = $city->todaysForecast;
                    $icon = '';

                    if ($forecast) {
                        switch ($forecast->weather_type) {
                            case 'sunny':
                                $icon = 'fas fa-sun text-warning';
                                break;
                            case 'cloudy':
                                $icon = 'fas fa-cloud text-secondary';
                                break;
                            case 'rainy':
                                $icon = 'fas fa-cloud-showers-heavy text-primary';
                                break;
                            case 'snowy':
                                $icon = 'fas fa-snowflake text-info';
                                break;
                            default:
                                $icon = 'fas fa-question';
                        }
                    }
                @endphp

                <div class="col-md-6 mb-3">
                    <div class="d-flex justify-content-between align-items-center border rounded p-3 shadow-sm bg-white">
                        <div>
                            <strong>{{ $city->name }}</strong>
                            @if($forecast)
                                <div class="text-muted small">{{ $forecast->temperature }}°C</div>
                            @else
                                <div class="text-danger small">Nema prognoze</div>
                            @endif
                        </div>
                        <i class="{{ $icon }} fa-2x"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="GET" action="{{ route("search") }}">
                    <div class="mb-3 position-relative">
                        <label for="city" class="form-label">Search City</label>
                        @if(Session::has("error"))
                            <p>{{ Session::get("error") }}</p>
                         @endif
                        <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter city name">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <span class="spinner-border spinner-border-sm d-none" id="search-spinner" role="status" aria-hidden="true"></span>
                        <span id="search-text">Search</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function () {
            document.getElementById("search-spinner").classList.remove("d-none");
            document.getElementById("search-text").textContent = "Searching...";
        });
    </script>
@endsection

