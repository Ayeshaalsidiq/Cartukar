@extends('layouts.admin')

@section('header', 'Tambah Mobil Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Merk Mobil</label>
                    <select name="brand" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="Daihatsu">Daihatsu</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Mazda">Mazda</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="BMW">BMW</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Model / Tipe</label>
                    <input type="text" name="model" required placeholder="Contoh: Avanza G 1.5" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tahun Pembuatan</label>
                    <input type="number" name="year" required placeholder="2022" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Harga (Rp)</label>
                    <input type="number" name="price" required placeholder="250000000" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi Showroom</label>
                    <select name="location" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                        <option value="Jakarta Selatan">Jakarta Selatan</option>
                        <option value="Jakarta Barat">Jakarta Barat</option>
                        <option value="Jakarta Pusat">Jakarta Pusat</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Medan">Medan</option>
                        <option value="Bali">Bali</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Jarak Tempuh (km)</label>
                    <input type="number" name="mileage" required placeholder="15000" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Transmisi</label>
                    <div class="flex gap-4">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="transmission" value="Automatic" class="peer sr-only" checked>
                            <div class="text-center py-3 rounded-xl border border-gray-200 peer-checked:bg-[#0F172A] peer-checked:text-white peer-checked:border-[#0F172A] transition">Automatic</div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="transmission" value="Manual" class="peer sr-only">
                            <div class="text-center py-3 rounded-xl border border-gray-200 peer-checked:bg-[#0F172A] peer-checked:text-white peer-checked:border-[#0F172A] transition">Manual</div>
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Foto Utama</label>
                <div class="relative w-full h-48 bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl flex items-center justify-center cursor-pointer hover:bg-gray-100 transition">
                    <input type="file" name="image" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="text-center text-gray-400">
                        <svg class="mx-auto h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="mt-1 text-sm">Klik untuk upload foto</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.cars.index') }}" class="px-6 py-3 rounded-xl text-gray-600 hover:bg-gray-100 font-bold transition">Batal</a>
                <button type="submit" class="px-8 py-3 bg-[#FACC15] text-[#0F172A] font-bold rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition">Simpan Mobil</button>
            </div>

        </form>
    </div>
</div>
@endsection