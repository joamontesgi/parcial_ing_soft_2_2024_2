<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="{{ route('routes.update', $route->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="name">
                Ingrese el nombre de la ruta
            </label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ $route->name }}">
            <label for="distance">
                Ingrese la distancia
            </label>
            <input type="number" name="distance" id="distance" class="form-control"required value="{{ $route->distance }}">
            <label for="origin">
                Ingrese el origen
            </label>
            <input required class="form-control" type="text" name="origin" id="origin" value="{{ $route->origin }}">
            <label for="destination">
                Ingrese el destino
            </label>
            <input required class="form-control" type="text" name="destination" id="destination" value="{{ $route->destination }}">
            <button type="submit">Actualizar ruta</button>
        </form>
    </div>
</body>

</html>
