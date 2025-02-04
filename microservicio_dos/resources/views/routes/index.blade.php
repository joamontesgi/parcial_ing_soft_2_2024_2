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
        <span class="text-success">La ruta con mayor distancia recorrida es: {{$route_max}}</span>
        {{$type_car_min}}
        <form action="{{ route('routes.store') }}" method="post">
            @csrf
            <label for="name">
                Ingrese el nombre de la ruta
            </label>
            <input type="text" name="name" id="name" class="form-control" required>
            <label for="distance">
                Ingrese la distancia
            </label>
            <input type="number" name="distance" id="distance" class="form-control"required>
            <label for="origin">
                Ingrese el origen
            </label>
            <input required class="form-control" type="text" name="origin" id="origin">
            <label for="destination">
                Ingrese el destino
            </label>
            <input required class="form-control" type="text" name="destination" id="destination">
            <button type="submit">Guardar ruta</button>
        </form>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Distancia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                    <tr>
                        <th scope="row">{{ $route->id }}</th>
                        <td>{{ $route->name }}</td>
                        <td>{{ $route->distance }}</td>
                        <td>{{ $route->origin }}</td>
                        <td>{{ $route->destination }}</td>
                        <td>
                            <a href="{{ route('routes.edit', $route->id) }}">Editar</a>
                            <form action="{{ route('routes.destroy', $route->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
