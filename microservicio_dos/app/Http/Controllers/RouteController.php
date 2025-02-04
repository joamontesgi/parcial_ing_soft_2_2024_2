<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\TypeCar;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        $route_max = Route::max('distance');
        $type_car_min = TypeCar::min('maximum_capacity');
        return view('routes.index', compact('routes', 'route_max', 'type_car_min'));
    }

    public function store(Request $request)
    {
        $route = new Route();
        $route->name = $request->name;
        $route->distance = $request->distance;
        $route->origin = $request->origin;
        $route->destination = $request->destination;
        $route->save();
        return redirect()->route('routes.index');
    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        return redirect()->route('routes.index');
    }

    public function edit($id)
    {
        $route = Route::find($id);
        return view('routes.edit', compact('route'));
    }

    public function update(Request $request, $id)
    {
        $route = Route::find($id);
        $route->name = $request->name;
        $route->distance = $request->distance;
        $route->origin = $request->origin;
        $route->destination = $request->destination;
        $route->save();
        return redirect()->route('routes.index');
    }


}
