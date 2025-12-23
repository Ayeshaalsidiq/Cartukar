<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(10); // Pagination 10 per halaman
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

   public function store(Request $request)
{
    $data = $request->validate([
        'brand' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer',
        'price' => 'required|numeric',
        'mileage' => 'required|integer',
        'transmission' => 'required|in:Manual,Automatic',
        'location' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // SIMPAN PATH BERSIH SAJA (cars/filename.jpg)
        $data['image'] = $request->file('image')->store('cars', 'public');
    }

    Car::create($data);

    return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan!');
}

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

public function update(Request $request, Car $car)
{
    $data = $request->validate([
        'brand' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer',
        'price' => 'required|numeric',
        'mileage' => 'required|integer',
        'transmission' => 'required|in:Manual,Automatic',
        'status' => 'required|in:available,sold,booked',
        'location' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // 1. HAPUS GAMBAR LAMA (PENTING AGAR TIDAK JADI SAMPAH)
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        // 2. SIMPAN GAMBAR BARU (PATH BERSIH)
        $data['image'] = $request->file('image')->store('cars', 'public');
    } else {
        // JANGAN UPDATE FIELD IMAGE JIKA TIDAK ADA UPLOAD BARU
        unset($data['image']);
    }

    $car->update($data);

    return redirect()->route('admin.cars.index')->with('success', 'Data mobil diperbarui!');
}
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Mobil dihapus!');
    }
}
