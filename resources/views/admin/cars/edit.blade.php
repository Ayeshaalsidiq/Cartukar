@extends('layouts.admin')

@section('header', 'Edit Data Mobil')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT') {{-- PENTING: Method PUT untuk update --}}

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Merk Mobil</label>
                    <select name="brand" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                        @foreach(['Toyota', 'Honda', 'Mitsubishi', 'Daihatsu', 'Suzuki', 'Nissan', 'Mazda', 'Hyundai', 'BMW', 'Mercedes-Benz'] as $brand)
                        <option value="{{ $brand }}" {{ $car->brand == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Model / Tipe</label>
                    <input type="text" name="model" value="{{ $car->model }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tahun Pembuatan</label>
                    <input type="number" name="year" value="{{ $car->year }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ $car->price }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi Showroom</label>
                    <select name="location" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                        @php
                        $locations = ['Jakarta Selatan', 'Jakarta Barat', 'Jakarta Pusat', 'Bandung', 'Surabaya', 'Medan', 'Bali'];
                        @endphp
                        @foreach($locations as $loc)
                        <option value="{{ $loc }}" {{ $car->location == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jarak Tempuh (km)</label>
                    <input type="number" name="mileage" value="{{ $car->mileage }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Status Unit</label>
                    <select name="status" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none font-bold">
                        <option value="available" {{ $car->status == 'available' ? 'selected' : '' }} class="text-green-600">Available (Tersedia)</option>
                        <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }} class="text-red-600">Sold (Terjual)</option>
                        <option value="booked" {{ $car->status == 'booked' ? 'selected' : '' }} class="text-yellow-600">Booked (Dipesan)</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Transmisi</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="transmission" value="Automatic" class="peer sr-only" {{ $car->transmission == 'Automatic' ? 'checked' : '' }}>
                            <div class="text-center py-3 rounded-xl border border-gray-200 peer-checked:bg-[#0F172A] peer-checked:text-white peer-checked:border-[#0F172A] transition">Automatic</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="transmission" value="Manual" class="peer sr-only" {{ $car->transmission == 'Manual' ? 'checked' : '' }}>
                            <div class="text-center py-3 rounded-xl border border-gray-200 peer-checked:bg-[#0F172A] peer-checked:text-white peer-checked:border-[#0F172A] transition">Manual</div>
                        </label>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-6">
                <label class="block text-sm font-bold text-gray-700 mb-4">Update Foto (Opsional)</label>
                <div class="flex items-center gap-6">
                    <div class="w-32 h-24 rounded-lg overflow-hidden border border-gray-200 shadow-sm relative">
                        <img src="{{asset('storage/' . $car->image) }}" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 w-full bg-black/50 text-white text-[10px] text-center py-1">Foto Saat Ini</div>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-brand-yellow/10 file:text-brand-dark hover:file:bg-brand-yellow/20 transition">
                        <p class="text-xs text-gray-400 mt-2">Biarkan kosong jika tidak ingin mengubah foto.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.cars.index') }}" class="px-6 py-3 rounded-xl text-gray-600 hover:bg-gray-100 font-bold transition">Batal</a>
                <button type="submit" class="px-8 py-3 bg-[#FACC15] text-[#0F172A] font-bold rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition">Update Data</button>
            </div>

        </form>
    </div>
</div>
@endsection