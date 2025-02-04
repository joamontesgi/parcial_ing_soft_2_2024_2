<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Route;
use App\Models\TypeCar;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $routes = Route::all();
        $typeCars = TypeCar::all();
        return view('cars.index', compact('cars', 'routes', 'typeCars'));
    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->id_route = $request->id_route;
        $car->id_type_car = $request->id_type_car;
        $car->driver = $request->driver;
        $car->save();
        return redirect()->route('cars.index');
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        $routes = Route::all();
        $typeCars = TypeCar::all();
        return view('car.edit', compact('car', 'routes', 'typeCars'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->id_route = $request->id_route;
        $car->id_type_car = $request->id_type_car;
        $car->driver = $request->driver;
        $car->save();
        return redirect()->route('cars.index');
    }
}
