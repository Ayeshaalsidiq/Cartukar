@extends('layouts.admin')

@section('header', 'Dashboard Overview')

@section('content')

{{-- CDN Chart.js (Wajib untuk grafik) --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="space-y-6">

    {{-- 1. STATS CARDS ROW --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Card 1: Total Mobil --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition group">
            <div>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-wider group-hover:text-brand-yellow transition">Total Unit</p>
                <p class="text-3xl font-black text-[#0F172A] mt-1">{{ number_format($totalCars) }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        </div>

        {{-- Card 2: Total User --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition group">
            <div>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-wider group-hover:text-purple-500 transition">Registered Users</p>
                <p class="text-3xl font-black text-[#0F172A] mt-1">{{ number_format($totalUsers) }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>

        {{-- Card 3: Terjual --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition group">
            <div>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-wider group-hover:text-green-500 transition">Unit Terjual</p>
                <p class="text-3xl font-black text-green-600 mt-1">{{ number_format($soldCars) }}</p>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    {{-- 2. CHARTS SECTION (MODERN & FIX SYNTAX ERROR) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Chart 1: Tren Upload (Line Chart) --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 lg:col-span-2">
            <h3 class="font-bold text-gray-800 text-lg mb-4">Tren Penambahan Mobil ({{ date('Y') }})</h3>
            <div class="relative h-64 w-full">
                <canvas id="uploadsChart"></canvas>
            </div>
        </div>

        {{-- Chart 2: Status Distribusi (Doughnut Chart) --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="font-bold text-gray-800 text-lg mb-4">Status Inventaris</h3>
            <div class="relative h-48 w-full flex justify-center">
                <canvas id="statusChart"></canvas>
            </div>
            {{-- Custom Legend --}}
            <div class="mt-6 space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-green-500"></span> Available</span>
                    <span class="font-bold text-gray-700">{{ $chartStatusData[0] ?? 0 }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-yellow-400"></span> Booked</span>
                    <span class="font-bold text-gray-700">{{ $chartStatusData[1] ?? 0 }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-red-500"></span> Sold</span>
                    <span class="font-bold text-gray-700">{{ $chartStatusData[2] ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. RECENT ACTIVITY TABLE --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <h3 class="font-bold text-gray-800 text-lg">Mobil Baru Ditambahkan</h3>
            <a href="{{ route('admin.cars.index') }}" class="text-sm text-[#FACC15] font-bold hover:text-yellow-600 hover:underline transition">Lihat Semua</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-gray-400 uppercase tracking-wider text-xs font-bold">
                    <tr>
                        <th class="px-6 py-4">Foto</th>
                        <th class="px-6 py-4">Merk & Model</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Tahun</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($recentCars as $car)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3">
                            <div class="w-16 h-12 rounded-lg overflow-hidden border border-gray-200">
                                {{-- PERBAIKAN IMAGE: Safe Logic tanpa Error --}}
                                <img src="{{ \Illuminate\Support\Str::startsWith($car->image, '/storage') ? asset($car->image) : asset('storage/' . $car->image) }}" class="w-full h-full object-cover">
                            </div>
                        </td>
                        <td class="px-6 py-3 font-bold text-gray-800">{{ $car->brand }} {{ $car->model }}</td>
                        <td class="px-6 py-3 font-mono text-gray-600 font-bold">Rp {{ number_format($car->price) }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 bg-gray-100 rounded text-xs font-bold">{{ $car->year }}</span>
                        </td>
                        <td class="px-6 py-3">
                            @if($car->status == 'sold')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Sold</span>
                            @elseif($car->status == 'booked')
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Booked</span>
                            @else
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold shadow-sm">Available</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                            Belum ada data.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- SCRIPT GRAPH CHART.JS --}}
<script>
    // 1. Line Chart (Tren Upload)
    const ctxUploads = document.getElementById('uploadsChart').getContext('2d');
    new Chart(ctxUploads, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Mobil Ditambahkan',
                // PERBAIKAN: Menggunakan json_encode agar tidak merah di editor
                data: {!! json_encode($chartMonthlyData) !!}, 
                borderColor: '#FACC15',
                backgroundColor: 'rgba(250, 204, 21, 0.1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#0F172A',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [2, 4] } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Doughnut Chart (Status)
    const ctxStatus = document.getElementById('statusChart').getContext('2d');
    new Chart(ctxStatus, {
        type: 'doughnut',
        data: {
            labels: ['Available', 'Booked', 'Sold'],
            datasets: [{
                // PERBAIKAN: Menggunakan json_encode
                data: {!! json_encode($chartStatusData) !!},
                backgroundColor: ['#22c55e', '#facc15', '#ef4444'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>

@endsection