<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmeni grad</title>
</head>
<body>
<h1>Izmeni podatke o gradu</h1>
<form action="{{ route('weather.update', $weather->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Koristi PUT metodu za ažuriranje -->
    <input type="text" name="city" value="{{ $weather->city }}" placeholder="Grad" required>
    <input type="number" name="temp" value="{{ $weather->temp }}" placeholder="Temperatura" required>
    <button type="submit">Sačuvaj izmene</button>
</form>
<a href="{{ route('weather.index') }}">
    <button>Nazad na listu</button>
</a>
</body>
</html>
