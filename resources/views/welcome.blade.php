@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("content")
    @foreach($userFavourites as $userFavourite)
        {{dd($userFavourite->city->name)}}
    @endforeach
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

