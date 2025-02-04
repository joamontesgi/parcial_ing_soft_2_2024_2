<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_route',
        'id_type_car',
        'driver',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class, 'id_route');
    }

    public function type_car()
    {
        return $this->belongsTo(TypeCar::class, 'id_type_car');
    }
}
