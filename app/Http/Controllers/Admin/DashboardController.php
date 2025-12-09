<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Statistik Utama
        $totalCars = Car::count();
        $totalUsers = User::count();
        // Asumsi: Kita hitung mobil yang statusnya 'sold'
        $soldCars = Car::where('status', 'sold')->count();

        // 2. Data Tambahan: 5 Mobil yang baru saja ditambahkan
        $recentCars = Car::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalCars', 'totalUsers', 'soldCars', 'recentCars'));
    }
}
