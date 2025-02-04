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
        <form action="{{ route('cars.store') }}" method="post">
            @csrf
            <label for="id_type_car">
                Ingrese el nombre de la ruta
            </label>
            <select name="id_type_car" id="id_type_car" required>
                @foreach ($typeCars as $typeCar)
                    <option value="{{ $typeCar->id }}">{{ $typeCar->name }}</option>
                @endforeach
            </select>
            <label for="id_route">
                Ingrese la ruta
            </label>
            <select name="id_route" id="id_route" required>
                <option value="">Seleccione una ruta</option>
                @foreach ($routes as $route)
                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                @endforeach
            </select>
            <label for="driver">
                Ingrese el nombre del conductor
            </label>
            <input required class="form-control" type="text" name="driver" id="driver" required>
            <button type="submit">Guardar ruta</button>
        </form>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre del conductor</th>
                    <th scope="col">Ruta</th>
                    <th scope="col">Tipo de vehículo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{ $car->id }}</th>
                        <td>{{ $car->driver }}</td>
                        <td>{{ $car->route->name }}</td>
                        <td>{{ $car->type_car->name }}</td>
                        <td>
                            <a href="{{ route('cars.edit', $car->id) }}">Editar</a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="post">
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
