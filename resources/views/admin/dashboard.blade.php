@extends('layouts.admin')

@section('header', 'Dashboard Overview')

@section('content')

{{-- 1. STATS CARDS ROW --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    {{-- Card 1: Total Mobil --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
        <div>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Mobil</p>
            <p class="text-3xl font-black text-[#0F172A] mt-1">{{ number_format($totalCars) }}</p>
        </div>
        <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
        </div>
    </div>

    {{-- Card 2: Total User --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
        <div>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total User</p>
            <p class="text-3xl font-black text-[#0F172A] mt-1">{{ number_format($totalUsers) }}</p>
        </div>
        <div class="w-12 h-12 bg-purple-50 rounded-full flex items-center justify-center text-purple-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
        </div>
    </div>

    {{-- Card 3: Terjual --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
        <div>
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Terjual</p>
            <p class="text-3xl font-black text-green-600 mt-1">{{ number_format($soldCars) }}</p>
        </div>
        <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center text-green-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
    </div>
</div>

{{-- 2. RECENT ACTIVITY TABLE (Mengisi ruang kosong) --}}
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
                        <div class="w-16 h-10 rounded overflow-hidden border border-gray-200">
                            <img src="{{ $car->image }}" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="px-6 py-3 font-bold text-gray-800">{{ $car->brand }} {{ $car->model }}</td>
                    <td class="px-6 py-3 font-mono text-gray-600">Rp {{ number_format($car->price) }}</td>
                    <td class="px-6 py-3">{{ $car->year }}</td>
                    <td class="px-6 py-3">
                        @if($car->status == 'sold')
                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-bold">Sold</span>
                        @elseif($car->status == 'booked')
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Booked</span>
                        @else
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Available</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400 flex flex-col items-center justify-center">
                        <svg class="w-10 h-10 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        Belum ada mobil yang ditambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection