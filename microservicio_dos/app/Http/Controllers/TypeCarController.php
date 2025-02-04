<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCar;

class TypeCarController extends Controller
{
    public function index(){
        $typeCars = TypeCar::all();
        return view('typeCar.index', compact('typeCars'));
    }

    public function store(Request $request)
    {
        $typeCar = new TypeCar();
        $typeCar->name = $request->name;
        $typeCar->maximum_capacity = $request->maximum_capacity;;
        $typeCar->save();
        return redirect()->route('type_cars.index');
    }

    public function destroy($id)
    {
        $typeCar = TypeCar::find($id);
        $typeCar->delete();
        return redirect()->route('type_cars.index');
    }

    public function edit($id)
    {
        $type_car = TypeCar::find($id);
        return view('typeCar.edit', compact('type_car'));
    }

    public function update(Request $request, $id)
    {
        $type_car = TypeCar::find($id);
        $type_car->name = $request->name;
        $type_car->maximum_capacity = $request->maximum_capacity;
        $type_car->save();
        return redirect()->route('type_cars.index');
    }
}
