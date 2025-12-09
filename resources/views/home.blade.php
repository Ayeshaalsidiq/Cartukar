<x-app>
    <x-slot name="title">CarTukar - Showroom Mobil Bekas #1</x-slot>

    {{-- SECTION 1: HERO --}}
    <div class="relative bg-brand-dark overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-brand-yellow rounded-full blur-[150px] opacity-5 translate-x-1/3 -translate-y-1/3"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-28 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-brand-yellow text-xs font-bold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        Live Stock: 1,240 Unit
                    </div>

                    <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight">
                        Upgrade Mobil.<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">
                            Upgrade Hidup.
                        </span>
                    </h1>

                    <p class="text-lg text-gray-400 max-w-lg">
                        Selamat datang di CarTukar. Showroom modern dengan standar inspeksi tertinggi. Beli, Jual, atau Tukar Tambah dalam 1 jam.
                    </p>

                    <div class="bg-white p-2 rounded-2xl shadow-2xl flex flex-col md:flex-row gap-2 max-w-xl">
                        <div class="flex-grow relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Cari: Pajero Sport 2022..." class="w-full pl-12 pr-4 py-4 bg-gray-50 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-yellow focus:outline-none font-medium text-brand-dark transition">
                        </div>
                        <button class="px-8 py-4 bg-brand-dark text-white font-bold rounded-xl hover:bg-brand-yellow hover:text-brand-dark transition shadow-lg">
                            Cari Mobil
                        </button>
                    </div>

                    <div class="flex items-center gap-6 text-sm text-gray-400 pt-2">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> Garansi Mesin</span>
                        <span class="flex items-center gap-1"><svg class="w-4 h-4 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> Bebas Banjir</span>
                        <span class="flex items-center gap-1"><svg class="w-4 h-4 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg> Surat Lengkap</span>
                    </div>
                </div>

                <div class="relative hidden lg:block">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-dark to-transparent z-10 h-20 bottom-0 top-auto w-full"></div>
                    <img src="https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?auto=format&fit=crop&w=1000&q=80" alt="Hero Car" class="w-full transform scale-110 hover:scale-105 transition duration-700 ease-out drop-shadow-2xl">

                    <div class="absolute bottom-10 -left-10 bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-xl shadow-xl z-20 flex items-center gap-4 max-w-xs">
                        <div class="w-12 h-12 rounded-full bg-brand-yellow flex items-center justify-center text-brand-dark font-bold text-xl">
                            4.9
                        </div>
                        <div>
                            <p class="text-white font-bold text-sm">Rating Kepuasan</p>
                            <p class="text-gray-300 text-xs">Dari 15.000+ Pelanggan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 2: STATS --}}
    <div class="bg-brand-yellow py-8 border-b-4 border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-black/10">
                <div>
                    <p class="text-3xl font-black text-brand-dark">12rb+</p>
                    <p class="text-brand-dark/70 font-semibold text-sm uppercase mt-1">Mobil Terjual</p>
                </div>
                <div>
                    <p class="text-3xl font-black text-brand-dark">30+</p>
                    <p class="text-brand-dark/70 font-semibold text-sm uppercase mt-1">Cabang Showroom</p>
                </div>
                <div>
                    <p class="text-3xl font-black text-brand-dark">150</p>
                    <p class="text-brand-dark/70 font-semibold text-sm uppercase mt-1">Titik Inspeksi</p>
                </div>
                <div>
                    <p class="text-3xl font-black text-brand-dark">1 Thn</p>
                    <p class="text-brand-dark/70 font-semibold text-sm uppercase mt-1">Garansi Mesin</p>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 3: TRUST & VALUE PROPOSITION --}}
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brand-yellow font-bold uppercase tracking-wider text-sm mb-2 block">Standar Kualitas</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark mb-4">Bukan Sekadar Jual Beli Mobil</h2>
                <p class="text-gray-500 text-lg">Kami menerapkan standar 150+ titik inspeksi untuk memastikan Anda tidak membeli "kucing dalam karung". Keamanan Anda prioritas kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="group p-8 rounded-3xl bg-gray-50 hover:bg-white hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 text-brand-yellow group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Garansi Uang Kembali 7 Hari</h3>
                    <p class="text-gray-500 leading-relaxed">Jika ada masalah mesin atau transmisi yang tidak terdeteksi, kembalikan mobilnya. Uang Anda kembali 100%.</p>
                </div>
                <div class="group p-8 rounded-3xl bg-gray-50 hover:bg-white hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 text-brand-yellow group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Bebas Manipulasi Odometer</h3>
                    <p class="text-gray-500 leading-relaxed">Kami menjamin kilometer asli. Tidak ada putar-putar angka. Riwayat servis tercatat jelas dan transparan.</p>
                </div>
                <div class="group p-8 rounded-3xl bg-gray-50 hover:bg-white hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center mb-6 text-brand-yellow group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-dark mb-3">Dokumen 100% Legal</h3>
                    <p class="text-gray-500 leading-relaxed">BPKB, STNK, dan Faktur kami verifikasi ke Samsat/Polda sebelum mobil masuk showroom. Dijamin aman.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3.5: HOW IT WORKS (NEW) --}}
    <section class="py-20 bg-gray-900 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-yellow rounded-full blur-[100px] opacity-10 translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500 rounded-full blur-[100px] opacity-10 -translate-x-1/3 translate-y-1/3"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-brand-yellow font-bold uppercase tracking-wider text-sm mb-2 block">Proses Mudah</span>
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Punya Mobil Impian Semudah 1-2-3-4</h2>
                <p class="text-gray-400 text-lg">Lupakan birokrasi yang rumit. Di CarTukar, kami mengurus semua dokumen dan proses leasing agar Anda bisa fokus memilih mobil terbaik.</p>
            </div>

            <div class="relative">
                <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-gray-700 -z-10"></div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <div class="relative group">
                        <div class="w-24 h-24 mx-auto bg-gray-800 border-4 border-gray-900 rounded-full flex items-center justify-center text-brand-yellow mb-6 shadow-xl group-hover:scale-110 group-hover:border-brand-yellow transition-all duration-300 z-10">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-2 group-hover:text-brand-yellow transition">1. Pilih Unit</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">Cari mobil di website kami. Filter berdasarkan budget, merek, atau tipe. Semua unit <i>ready stock</i>.</p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="w-24 h-24 mx-auto bg-gray-800 border-4 border-gray-900 rounded-full flex items-center justify-center text-brand-yellow mb-6 shadow-xl group-hover:scale-110 group-hover:border-brand-yellow transition-all duration-300 z-10">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-2 group-hover:text-brand-yellow transition">2. Jadwalkan Test Drive</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">Booking jadwal kunjungan atau minta <i>Home Service</i>. Kami antar mobil ke rumah Anda untuk dicek.</p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="w-24 h-24 mx-auto bg-gray-800 border-4 border-gray-900 rounded-full flex items-center justify-center text-brand-yellow mb-6 shadow-xl group-hover:scale-110 group-hover:border-brand-yellow transition-all duration-300 z-10">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-2 group-hover:text-brand-yellow transition">3. Pemberkasan Mudah</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">Pilih Tunai atau Kredit. Tim kami bantu urus leasing dengan peluang <i>approval</i> tinggi.</p>
                        </div>
                    </div>

                    <div class="relative group">
                        <div class="w-24 h-24 mx-auto bg-gray-800 border-4 border-gray-900 rounded-full flex items-center justify-center text-brand-yellow mb-6 shadow-xl group-hover:scale-110 group-hover:border-brand-yellow transition-all duration-300 z-10">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="text-xl font-bold mb-2 group-hover:text-brand-yellow transition">4. Serah Terima</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">Selesai! Mobil diantar ke garasi Anda dalam kondisi bersih, diservis, dan tangki penuh.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16 text-center">
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-bold rounded-full text-brand-dark bg-brand-yellow hover:bg-white hover:scale-105 transition-all duration-300 shadow-lg shadow-yellow-500/20">
                        Mulai Pencarian Mobil
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: POPULAR BRANDS (UPDATED) --}}
    <div class="bg-gray-50 py-16 border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-10">
                <h2 class="text-2xl font-bold text-brand-dark">Pilih Brand Populer</h2>
                <a href="#" class="text-sm font-bold text-brand-yellow hover:text-yellow-600 transition">Lihat Semua Brand &rarr;</a>
            </div>

            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-6">
                @php
                // Data Brand dengan Logo URL yang Stabil (CDN)
                $brands = [
                ['name' => 'Toyota', 'url' => 'https://cdn.worldvectorlogo.com/logos/toyota-1.svg'],
                ['name' => 'Honda', 'url' => 'https://cdn.worldvectorlogo.com/logos/honda-12.svg'],
                ['name' => 'Daihatsu', 'url' => 'https://cdn.worldvectorlogo.com/logos/daihatsu.svg'],
                ['name' => 'Mitsubishi', 'url' => 'https://cdn.worldvectorlogo.com/logos/mitsubishi-1.svg'],
                ['name' => 'Suzuki', 'url' => 'https://cdn.worldvectorlogo.com/logos/suzuki-logo.svg'],
                ['name' => 'Nissan', 'url' => 'https://cdn.worldvectorlogo.com/logos/nissan-6.svg'],
                ['name' => 'Mazda', 'url' => 'https://cdn.worldvectorlogo.com/logos/mazda-2.svg'],
                ['name' => 'Hyundai', 'url' => 'https://cdn.worldvectorlogo.com/logos/hyundai-6.svg'],
                ['name' => 'Wuling', 'url' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Wuling_Motors_logo.svg'],
                ['name' => 'BMW', 'url' => 'https://cdn.worldvectorlogo.com/logos/bmw-2.svg'],
                ['name' => 'Mercedes', 'url' => 'https://cdn.worldvectorlogo.com/logos/mercedes-benz-9.svg'],
                ['name' => 'Lexus', 'url' => 'https://cdn.worldvectorlogo.com/logos/lexus-logo.svg'],
                ];
                @endphp

                @foreach($brands as $brand)
                <a href="#" class="group p-6 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-xl hover:border-brand-yellow transition-all duration-300 flex flex-col items-center justify-center gap-4 h-32">
                    <div class="w-16 h-16 flex items-center justify-center filter grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:scale-110">
                        <img src="{{ $brand['url'] }}" alt="{{ $brand['name'] }}" class="max-w-full max-h-full object-contain">
                    </div>
                    <span class="text-xs font-bold text-gray-500 group-hover:text-brand-dark transition">{{ $brand['name'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- SECTION 5: LATEST STOCK (DATA REAL DB FIX) --}}
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <span class="text-brand-yellow font-bold uppercase tracking-wider text-sm">Rekomendasi Editor</span>
                    <h2 class="text-3xl font-extrabold text-brand-dark mt-1">Stok Terbaru Minggu Ini</h2>
                </div>
                <a href="{{ route('cars.index') }}" class="hidden md:flex items-center gap-2 font-bold text-brand-dark hover:text-brand-yellow transition">
                    Lihat Semua Stok
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($cars as $car)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 group overflow-hidden border border-gray-100 relative">
                    <div class="h-60 overflow-hidden relative bg-gray-200">
                        {{-- FIX 1: Gunakan $car->image --}}
                        <img src="{{ $car->image }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $car->model }}">
                        <div class="absolute top-4 left-4">
                            <span class="bg-brand-yellow text-brand-dark text-xs font-bold px-3 py-1.5 rounded shadow-sm">
                                {{-- FIX 2: Gunakan $car->badge --}}
                                {{ $car->badge ?? 'Tersedia' }}
                            </span>
                        </div>
                        <button class="absolute top-4 right-4 bg-white/80 p-2 rounded-full hover:bg-red-50 hover:text-red-500 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                {{-- FIX 3: Tambahkan Link ke Detail --}}
                                <a href="{{ route('cars.show', $car->id) }}">
                                    <h3 class="text-xl font-bold text-brand-dark line-clamp-1 group-hover:text-brand-yellow transition cursor-pointer">
                                        {{-- FIX 4: Gunakan $car->brand --}}
                                        {{ $car->brand }} {{ $car->model }}
                                    </h3>
                                </a>
                                {{-- FIX 5: Gunakan $car->year --}}
                                <p class="text-sm text-gray-400">{{ $car->year }} • {{ $car->transmission }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-y-2 text-sm text-gray-500 my-4 bg-gray-50 p-3 rounded-lg">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{-- FIX 6: Format Mileage --}}
                                {{ number_format($car->mileage) }} km
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                {{-- FIX 7: Gunakan $car->location --}}
                                {{ $car->location }}
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-2 border-t border-gray-100 mt-2">
                            <div>
                                <span class="text-xs text-gray-400 block">Harga Tunai</span>
                                {{-- FIX 8: Format Harga --}}
                                <span class="text-xl font-black text-brand-dark">Rp {{ number_format($car->price, 0, ',', '.') }}</span>
                            </div>
                            {{-- FIX 9: Link Detail --}}
                            <a href="{{ route('cars.show', $car->id) }}" class="bg-brand-dark text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-brand-yellow hover:text-brand-dark transition inline-block text-center">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center bg-white rounded-2xl border border-dashed border-gray-300">
                    <p class="text-gray-400 text-lg">Stok sedang diperbarui oleh tim showroom kami.</p>
                </div>
                @endforelse
            </div>

            <div class="mt-12 text-center md:hidden">
                <button class="w-full py-3 border-2 border-brand-dark text-brand-dark font-bold rounded-xl">Lihat Semua Stok</button>
            </div>
        </div>
    </div>

    {{-- SECTION 6: CREDIT CALCULATOR --}}
    <section class="bg-brand-dark py-20 relative overflow-hidden border-b border-white/10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-brand-yellow/10 rounded-full blur-[120px] -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
                <div class="md:w-5/12 bg-gray-50 p-10 flex flex-col justify-center">
                    <span class="text-brand-yellow font-bold uppercase tracking-wider text-sm mb-2">Simulasi Kredit</span>
                    <h2 class="text-3xl font-extrabold text-brand-dark mb-4">Hitung Cicilan Mobil Impian</h2>
                    <p class="text-gray-500 mb-6">Sesuaikan DP dan tenor sesuai kemampuan finansial Anda. Kami bekerja sama dengan leasing terpercaya.</p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-gray-700">Proses Cepat 1x24 Jam</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="font-medium text-gray-700">Bunga Kompetitif Mulai 0.8%</span>
                        </div>
                    </div>
                </div>

                <div class="md:w-7/12 p-10 bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Harga Mobil (Rp)</label>
                            <input type="number" placeholder="Contoh: 250.000.000" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-brand-yellow focus:outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Uang Muka / DP (%)</label>
                            <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-brand-yellow focus:outline-none transition">
                                <option>20%</option>
                                <option>30%</option>
                                <option>40%</option>
                                <option>50%</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-gray-700 mb-2">Jangka Waktu (Tenor)</label>
                            <div class="grid grid-cols-3 sm:grid-cols-5 gap-3">
                                <button class="py-2 px-4 rounded-lg border border-gray-200 hover:border-brand-yellow hover:bg-yellow-50 font-medium text-sm transition">1 Thn</button>
                                <button class="py-2 px-4 rounded-lg bg-brand-dark text-white border border-brand-dark font-medium text-sm transition">2 Thn</button>
                                <button class="py-2 px-4 rounded-lg border border-gray-200 hover:border-brand-yellow hover:bg-yellow-50 font-medium text-sm transition">3 Thn</button>
                                <button class="py-2 px-4 rounded-lg border border-gray-200 hover:border-brand-yellow hover:bg-yellow-50 font-medium text-sm transition">4 Thn</button>
                                <button class="py-2 px-4 rounded-lg border border-gray-200 hover:border-brand-yellow hover:bg-yellow-50 font-medium text-sm transition">5 Thn</button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xs text-gray-400 uppercase font-bold">Estimasi Cicilan per Bulan</p>
                                <p class="text-3xl font-black text-brand-dark">Rp 4.250.000</p>
                            </div>
                            <button class="bg-brand-yellow text-brand-dark px-6 py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                                Ajukan Sekarang
                            </button>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">*Perhitungan hanya simulasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 7: TRADE IN CTA --}}
    <section class="relative py-32 overflow-hidden bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1600712242805-5f78671b24da?q=80&w=2000&auto=format&fit=crop" alt="Luxury Car Background" class="w-full h-full object-cover opacity-60">
        </div>
        <div class="absolute inset-0 z-10 bg-gradient-to-r from-gray-900 via-gray-900/90 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="lg:w-1/2">
                <span class="text-brand-yellow font-bold uppercase tracking-widest text-sm mb-3 block">Layanan Unggulan</span>

                <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
                    Ingin Ganti Mobil?<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">
                        Tukar Tambah Aja.
                    </span>
                </h2>

                <p class="text-gray-300 text-lg mb-10 leading-relaxed">
                    Jangan jual murah ke tengkulak. Kami menghargai mobil lama Anda dengan <strong>harga pasar tertinggi</strong> untuk dijadikan DP mobil impian Anda.
                </p>

                <div class="space-y-8">
                    <div class="flex gap-5 items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-white/10 border border-white/20 rounded-xl flex items-center justify-center text-brand-yellow font-black text-xl backdrop-blur-sm">1</div>
                        <div>
                            <h4 class="font-bold text-xl text-white">Inspeksi Gratis ke Rumah</h4>
                            <p class="text-sm text-gray-400 mt-1 leading-relaxed">Tim kami akan datang mengecek kondisi fisik & mesin mobil Anda di lokasi Anda.</p>
                        </div>
                    </div>

                    <div class="flex gap-5 items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-white/10 border border-white/20 rounded-xl flex items-center justify-center text-brand-yellow font-black text-xl backdrop-blur-sm">2</div>
                        <div>
                            <h4 class="font-bold text-xl text-white">Penawaran Harga Transparan</h4>
                            <p class="text-sm text-gray-400 mt-1 leading-relaxed">Harga sesuai kondisi real, tanpa biaya tersembunyi atau permainan harga.</p>
                        </div>
                    </div>

                    <div class="flex gap-5 items-start">
                        <div class="flex-shrink-0 w-12 h-12 bg-brand-yellow rounded-xl flex items-center justify-center text-brand-dark font-black text-xl shadow-[0_0_20px_rgba(250,204,21,0.4)]">3</div>
                        <div>
                            <h4 class="font-bold text-xl text-white">Langsung Bawa Pulang Mobil Baru</h4>
                            <p class="text-sm text-gray-400 mt-1 leading-relaxed">Gunakan nilai mobil lama sebagai Down Payment (DP) atau pengurang harga tunai.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="bg-brand-yellow text-brand-dark font-bold py-4 px-10 rounded-xl hover:bg-white hover:scale-105 transition-all duration-300 shadow-xl shadow-yellow-500/20">
                        Jadwalkan Inspeksi Gratis Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>



    {{-- SECTION 8: TESTIMONIALS --}}
    <section class="py-20 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div class="max-w-2xl">
                    <span class="text-brand-yellow font-bold uppercase tracking-wider text-sm">Kata Mereka</span>
                    <h2 class="text-3xl font-extrabold text-brand-dark mt-2">Cerita Bahagia Pelanggan CarTukar</h2>
                </div>
                <div class="flex gap-2 mt-4 md:mt-0">
                    <button class="w-12 h-12 rounded-full border border-brand-dark/10 flex items-center justify-center hover:bg-brand-dark hover:text-white transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg></button>
                    <button class="w-12 h-12 rounded-full bg-brand-dark text-white flex items-center justify-center hover:bg-brand-yellow hover:text-brand-dark transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg></button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-4 right-8 text-6xl text-brand-yellow/20 font-serif">"</div>
                    <div class="flex items-center gap-1 text-yellow-400 mb-4">
                        @for($i=0; $i<5; $i++) <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                    </div>
                    <p class="text-gray-600 italic mb-6">"Awalnya ragu beli mobil bekas online. Tapi pas liat unitnya di CarTukar, beneran mulus kayak baru. Stafnya transparan soal kondisi minus minor. Sangat puas!"</p>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-brand-dark text-sm">Budi Santoso</h4>
                            <p class="text-xs text-gray-400">Membeli Toyota Fortuner</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-4 right-8 text-6xl text-brand-yellow/20 font-serif">"</div>
                    <div class="flex items-center gap-1 text-yellow-400 mb-4">
                        @for($i=0; $i<5; $i++) <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                    </div>
                    <p class="text-gray-600 italic mb-6">"Proses tukar tambah sangat cepat. Mobil lama saya dihargai tinggi, langsung buat DP mobil baru. 2 hari unit sudah sampai di garasi rumah."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-brand-dark text-sm">Siti Aminah</h4>
                            <p class="text-xs text-gray-400">Tukar Tambah Honda Jazz</p>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block bg-gray-50 p-8 rounded-2xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-4 right-8 text-6xl text-brand-yellow/20 font-serif">"</div>
                    <div class="flex items-center gap-1 text-yellow-400 mb-4">
                        @for($i=0; $i<5; $i++) <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                    </div>
                    <p class="text-gray-600 italic mb-6">"Dokumen lengkap dan diurus semua sama tim CarTukar. Saya tinggal duduk manis terima kunci. Terima kasih Mas Andre bantuannya!"</p>
                    <div class="flex items-center gap-4">
                        <img src="https://randomuser.me/api/portraits/men/85.jpg" alt="User" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-brand-dark text-sm">Rahmat Hidayat</h4>
                            <p class="text-xs text-gray-400">Membeli Mitsubishi Xpander</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- SECTION 9: FINAL CTA / CONTACT --}}
    <div class="bg-white py-20">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-brand-dark mb-4">Masih Ragu? Hubungi Konsultan Kami.</h2>
            <p class="text-gray-500 mb-8">Konsultasi gratis mengenai pembiayaan, spesifikasi mobil, hingga kelengkapan dokumen.</p>
            <div class="flex justify-center gap-4">
                <button class="px-8 py-3 bg-green-500 text-white font-bold rounded-full hover:bg-green-600 transition flex items-center gap-2 shadow-lg shadow-green-500/30">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg>
                    Chat WhatsApp
                </button>
                <button class="px-8 py-3 border-2 border-brand-dark text-brand-dark font-bold rounded-full hover:bg-brand-dark hover:text-white transition">
                    Lihat Lokasi Showroom
                </button>
            </div>
        </div>
    </div>
</x-app>