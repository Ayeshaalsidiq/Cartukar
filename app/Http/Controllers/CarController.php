<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
   public function index(Request $request)
    {
        // 1. Inisialisasi Query (Hanya mobil yang available)
        $query = Car::where('status', 'available');

        // 2. Filter Pencarian (Keyword)
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q) use ($search) {
                $q->where('model', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%");
            });
        }

        // 3. Filter Merk (Brand)
        if ($request->filled('brand')) {
            $query->whereIn('brand', $request->brand);
        }

        // 4. Filter Lokasi (BARU DITAMBAHKAN)
        if ($request->filled('location')) {
            $query->whereIn('location', $request->location);
        }

        // 5. Filter Tipe Bodi (BARU DITAMBAHKAN)
        if ($request->filled('body_type')) {
            $query->whereIn('body_type', $request->body_type);
        }

        // 6. Filter Rentang Harga (BARU DITAMBAHKAN)
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // 7. Sorting / Urutan (BARU DITAMBAHKAN)
        if ($request->filled('sort')) {
            if ($request->sort == 'lowest_price') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'highest_price') {
                $query->orderBy('price', 'desc');
            } else {
                $query->latest(); 
            }
        } else {
            $query->latest();
        }

        // 8. Eksekusi Pagination
        $cars = $query->paginate(9)->withQueryString();

        // 9. Data Pendukung untuk View
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
