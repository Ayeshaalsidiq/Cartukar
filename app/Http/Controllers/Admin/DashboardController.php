<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Penting untuk query chart

class DashboardController extends Controller
{
    public function index()
    {
        // 1. STATS CARD DATA
        $totalCars = Car::count();
        $totalUsers = User::count();
        $soldCars = Car::where('status', 'sold')->count();
        $recentCars = Car::latest()->take(5)->get();

        // 2. DATA UNTUK CHART DONAT (Status Mobil)
        // Menghitung jumlah mobil berdasarkan statusnya (available, sold, booked)
        $statusStats = Car::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        // Pastikan format array lengkap agar chart tidak error jika datanya 0
        $chartStatusData = [
            $statusStats['available'] ?? 0,
            $statusStats['booked'] ?? 0,
            $statusStats['sold'] ?? 0,
        ];

        // 3. DATA UNTUK CHART GARIS (Tren Upload Bulanan Tahun Ini)
        $monthlyUploads = Car::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Siapkan array 12 bulan (Jan-Des), isi 0 jika tidak ada data
        $chartMonthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartMonthlyData[] = $monthlyUploads[$i] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalCars', 
            'totalUsers', 
            'soldCars', 
            'recentCars',
            'chartStatusData', // Data Chart 1
            'chartMonthlyData' // Data Chart 2
        ));
    }
}