@extends('layouts.admin')

@section('header', 'Kelola Mobil')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
        <div>
            <h3 class="font-bold text-lg text-gray-800">Daftar Stok Mobil</h3>
            <p class="text-xs text-gray-500">Kelola semua unit yang tersedia di showroom.</p>
        </div>
        <a href="{{ route('admin.cars.create') }}" class="bg-[#0F172A] hover:bg-gray-800 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Mobil
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-500 uppercase text-xs font-bold tracking-wider">
                    <th class="px-6 py-4">Gambar</th>
                    <th class="px-6 py-4">Detail Unit</th>
                    <th class="px-6 py-4">Harga (Rp)</th>
                    <th class="px-6 py-4">Transmisi</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($cars as $car)
                <tr class="hover:bg-gray-50 transition group">
                    <td class="px-6 py-4">
                        <div class="w-24 h-16 rounded-lg overflow-hidden border border-gray-200 shadow-sm relative">
                            <img src="{{ asset('storage/' . $car->image) }}" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-[#0F172A] text-base">{{ $car->brand }} {{ $car->model }}</div>
                        <div class="text-sm text-gray-500">Tahun {{ $car->year }} • {{ number_format($car->mileage) }} km</div>
                    </td>
                    <td class="px-6 py-4 font-mono font-bold text-green-600">
                        {{ number_format($car->price) }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-bold border border-blue-100">
                            {{ $car->transmission }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center items-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="p-2 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </a>

                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mobil ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="p-2 bg-red-100 text-red-700 rounded hover:bg-red-200 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-12 text-gray-400">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p>Belum ada data mobil.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="p-6 border-t border-gray-100">
        {{ $cars->links() }}
    </div>
</div>
@endsection