<form>
    <input type="text" name="temperature" placeholder="Enter a temperature">

    <select name="city_id">
        @foreach(\App\Models\CitiesModel::all() as $city)
            <option value="{{$city->id}}"> {{$city->name}} </option>
        @endforeach
    </select>

    <button>Submit</button>
</form>


<div>
    @foreach(\App\Models\WeatherModel::all() as $weather)
        <p>{{$weather->city->name}} - {{$weather->temperature}}</p>
    @endforeach
</div>
