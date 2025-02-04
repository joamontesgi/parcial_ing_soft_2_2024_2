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
        <form action="{{ route('type_cars.store') }}" method="post">
            @csrf
            <label for="name">
                Ingrese el nombre del vehículo
            </label>
            <input type="text" name="name" id="name" class="form-control" required>
            <label for="maximum_capacity">
                Ingrese la capacidad máxima
            </label>
            <input required class="form-control" type="text" name="maximum_capacity" id="maximum_capacity">
            <button type="submit">Guardar ruta</button>
        </form>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Capacidad máxima</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($typeCars as $typeCar)
                    <tr>
                        <th scope="row">{{ $typeCar->id }}</th>
                        <td>{{ $typeCar->name }}</td>
                        <td>{{ $typeCar->maximum_capacity }}</td>
                        <td>
                            <a href="{{ route('type_cars.edit', $typeCar->id) }}">Editar</a>
                            <form action="{{ route('type_cars.destroy', $typeCar->id) }}" method="post">
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
