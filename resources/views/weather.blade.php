<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista gradova</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Lista gradova</h1>
<a href="{{ route('weather.create') }}">
    <button>Dodaj novi grad</button>
</a>

<table>
    <tr>
        <th>Grad</th>
        <th>Temperatura (°C)</th>
        <th>Akcije</th>
    </tr>
    @foreach($weather as $w)
        <tr>
            <td>{{ $w->city }}</td>
            <td>{{ $w->temp }} °C</td>
            <td>
                <a href="{{ route('weather.edit', $w->id) }}">
                    <button>Izmeni</button>
                </a>
                <form action="{{ route('weather.destroy', $w->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Obriši</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>


