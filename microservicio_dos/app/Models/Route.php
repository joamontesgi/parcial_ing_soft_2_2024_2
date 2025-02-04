<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'distance',
        'origin',
        'destination',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    // public function type_cars()
    // {
    //     return $this->belongsToMany(TypeCar::class, 'cars', 'id_route', 'id_type_car');
    // }
}
