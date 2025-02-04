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
        <form action="{{ route('type_cars.update', $type_car->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="name">
                Ingrese el nombre del tipo de carro
            </label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ $type_car->name }}">
            <label for="maximum_capacity">
                Ingrese la capacidad máxima
            </label>
            <input type="number" name="maximum_capacity" id="maximum_capacity" class="form-control"required value="{{ $type_car->maximum_capacity }}">
            <button type="submit">Actualizar ruta</button>
        </form>
    </div>
</body>

</html>
