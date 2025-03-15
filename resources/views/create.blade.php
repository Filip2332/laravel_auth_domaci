<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj grad</title>
</head>
<body>
<h1>Dodaj novi grad</h1>
<form action="{{ route('weather.store') }}" method="POST">
    @csrf
    <input type="text" name="city" placeholder="Grad" required>
    <input type="number" name="temp" placeholder="Temperatura" required>
    <button type="submit">Sačuvaj</button>
</form>
<a href="{{ route('weather.index') }}">
    <button>Nazad na listu</button>
</a>
</body>
</html>
