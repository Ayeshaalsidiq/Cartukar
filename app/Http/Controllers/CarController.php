<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Halaman Katalog
    public function index(Request $request)
    {
        $query = Car::where('status', 'available');

        if ($request->filled('q')) {
            $query->where('model', 'like', '%' . $request->q . '%')
                ->orWhere('brand', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('brand')) {
            $query->whereIn('brand', $request->brand);
        }

        $cars = $query->latest()->paginate(9);

        // Data untuk filter
        $brands = Car::select('brand')->distinct()->pluck('brand');
        $locations = Car::select('location')->distinct()->pluck('location');
        $bodyTypes = ['SUV', 'MPV', 'Sedan', 'Hatchback', 'LCGC', 'Luxury'];

        return view('cars.index', compact('cars', 'brands', 'locations', 'bodyTypes'));
    }

    // Halaman Detail (Show)
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
}
