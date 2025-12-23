<x-app>
    <x-slot name="title">{{ $car->brand }} {{ $car->model }} | Detail Unit</x-slot>
    
    @php
    // --- PERBAIKAN LOGIKA GAMBAR (SAFE LOGIC) ---
    // Kita gunakan \Illuminate\Support\Str secara langsung (tanpa 'use')
    
    $rawImage = $car->image;
    // Cek apakah path di database format lama (/storage/...) atau baru (cars/...)
    $processedImage = \Illuminate\Support\Str::startsWith($rawImage, '/storage') 
        ? asset($rawImage) 
        : asset('storage/' . $rawImage);

    // A. Gambar Utama 
    // Jika ada galeri, pakai foto pertama galeri. Jika tidak, pakai processedImage.
    $mainImage = ($car->images && $car->images->count() > 0)
        ? $car->images->first()->url
        : $processedImage;

    // B. Format Harga
    $priceFormatted = number_format($car->price, 0, ',', '.');
    $priceInMillions = number_format($car->price / 1000000, 0) . ' Juta';

    // C. Status Badge & Label
    $statusColor = match($car->status) {
        'sold' => 'bg-red-500',
        'booked' => 'bg-yellow-500',
        default => 'bg-green-500',
    };
    $statusLabel = match($car->status) {
        'sold' => 'TERJUAL',
        'booked' => 'DIPESAN',
        default => 'TERSEDIA',
    };

    // D. Link WhatsApp Dinamis
    $pesanWA = "Halo, saya tertarik dengan mobil {$car->brand} {$car->model} tahun {$car->year} (ID: {$car->id}). Apakah unit masih tersedia?";
    $waLink = "https://wa.me/628123456789?text=" . urlencode($pesanWA);

    // E. Simulasi Kredit Sederhana
    $dpAmount = $car->price * 0.20; // DP 20%
    $loanAmount = $car->price - $dpAmount;
    $monthlyInstallment = ($loanAmount + ($loanAmount * 0.08 * 5)) / 60; // Bunga 8%, Tenor 5th
    @endphp

    {{-- HEADER MOBILE (Sticky) --}}
    <div class="lg:hidden bg-white border-b border-gray-200 sticky top-16 z-30 px-4 py-3 shadow-sm flex justify-between items-center transition-all">
        <div>
            <h1 class="text-sm font-bold text-brand-dark line-clamp-1">{{ $car->brand }} {{ $car->model }}</h1>
            <p class="text-xs text-gray-500">{{ $car->year }} • {{ $car->transmission }}</p>
        </div>
        <div class="text-right">
            <p class="text-xs text-gray-400">Harga Tunai</p>
            <p class="text-sm font-bold text-brand-dark">{{ $priceInMillions }}</p>
        </div>
    </div>

    {{-- KONTEN UTAMA --}}
    <div x-data="carDetail()" class="bg-[#F8F9FA] min-h-screen pb-20">

        {{-- BREADCRUMB --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center text-xs font-medium text-gray-400 gap-2">
                <a href="/" class="hover:text-brand-dark transition">Home</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('cars.index') }}" class="hover:text-brand-dark transition">Katalog</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-brand-dark font-bold truncate">{{ $car->brand }} {{ $car->model }}</span>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- KOLOM KIRI (DETAIL LENGKAP) --}}
                <div class="lg:col-span-8 space-y-8">

                    {{-- 1. GALERI FOTO --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="relative aspect-[16/10] bg-gray-200 group">
                            <img :src="activeImage" class="w-full h-full object-cover transition-transform duration-500" alt="Detail Mobil">

                            {{-- Badge Status --}}
                            <div class="absolute top-4 left-4">
                                <span class="{{ $statusColor }} text-white text-[10px] font-bold px-3 py-1.5 rounded shadow-md uppercase tracking-wider">
                                    {{ $statusLabel }}
                                </span>
                            </div>

                            {{-- Badge Certified --}}
                            <div class="absolute top-4 right-4">
                                <span class="bg-brand-yellow text-brand-dark text-[10px] font-bold px-3 py-1.5 rounded shadow-md uppercase tracking-wider flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Lulus Inspeksi
                                </span>
                            </div>
                        </div>

                        {{-- Thumbnails --}}
                        <div class="p-4 flex gap-3 overflow-x-auto scrollbar-hide border-t border-gray-100 bg-white">
                            {{-- Foto Utama (UPDATED: Menggunakan processedImage) --}}
                            <button @click="activeImage = '{{ $processedImage }}'"
                                class="w-20 h-14 flex-shrink-0 rounded-lg overflow-hidden border-2 transition-all bg-gray-100"
                                :class="activeImage === '{{ $processedImage }}' ? 'border-brand-yellow ring-2 ring-brand-yellow/20' : 'border-transparent opacity-60 hover:opacity-100'">
                                <img src="{{ $processedImage }}" class="w-full h-full object-cover">
                            </button>

                            {{-- Foto Galeri --}}
                            @if($car->images && $car->images->count() > 0)
                            @foreach($car->images as $img)
                            <button @click="activeImage = '{{ $img->url }}'"
                                class="w-20 h-14 flex-shrink-0 rounded-lg overflow-hidden border-2 transition-all bg-gray-100"
                                :class="activeImage === '{{ $img->url }}' ? 'border-brand-yellow ring-2 ring-brand-yellow/20' : 'border-transparent opacity-60 hover:opacity-100'">
                                <img src="{{ $img->url }}" class="w-full h-full object-cover">
                            </button>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- 2. TABS NAVIGASI STICKY --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-1 sticky top-20 z-20 flex overflow-x-auto">
                        <button @click="scrollTo('spesifikasi')" class="flex-1 py-3 px-6 whitespace-nowrap text-sm font-bold rounded-lg transition" :class="activeSection === 'spesifikasi' ? 'bg-brand-dark text-white shadow-md' : 'text-gray-500 hover:bg-gray-50'">Spesifikasi</button>
                        <button @click="scrollTo('inspeksi')" class="flex-1 py-3 px-6 whitespace-nowrap text-sm font-bold rounded-lg transition" :class="activeSection === 'inspeksi' ? 'bg-brand-dark text-white shadow-md' : 'text-gray-500 hover:bg-gray-50'">Laporan Inspeksi</button>
                        <button @click="scrollTo('teknisi')" class="flex-1 py-3 px-6 whitespace-nowrap text-sm font-bold rounded-lg transition" :class="activeSection === 'teknisi' ? 'bg-brand-dark text-white shadow-md' : 'text-gray-500 hover:bg-gray-50'">Teknisi</button>
                        <button @click="scrollTo('kredit')" class="flex-1 py-3 px-6 whitespace-nowrap text-sm font-bold rounded-lg transition" :class="activeSection === 'kredit' ? 'bg-brand-dark text-white shadow-md' : 'text-gray-500 hover:bg-gray-50'">Kredit</button>
                    </div>

                    {{-- 3. SPESIFIKASI --}}
                    <div id="spesifikasi" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 scroll-mt-36">
                        <h3 class="text-xl font-bold text-brand-dark mb-6 border-b pb-4 border-gray-100">Detail Spesifikasi</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-8 gap-x-4">
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-bold mb-1">Jarak Tempuh</p>
                                <p class="font-bold text-brand-dark text-lg">{{ number_format($car->mileage) }} km</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-bold mb-1">Transmisi</p>
                                <p class="font-bold text-brand-dark text-lg">{{ $car->transmission }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-bold mb-1">Tahun</p>
                                <p class="font-bold text-brand-dark text-lg">{{ $car->year }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-bold mb-1">Bahan Bakar</p>
                                <p class="font-bold text-brand-dark text-lg">Bensin</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-bold mb-1">Warna</p>
                                <p class="font-bold text-brand-dark text-lg">Original</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase font-bold mb-1">Lokasi</p>
                                <p class="font-bold text-brand-dark text-lg">{{ $car->location ?? 'Jakarta' }}</p>
                            </div>
                        </div>

                        <h4 class="font-bold text-gray-800 mt-8 mb-4">Fitur Kendaraan</h4>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['Keyless Entry', 'Kamera Mundur', 'Sensor Parkir', 'Bluetooth Audio', 'Electric Mirror', 'ABS & EBD', 'Airbag', 'Power Window'] as $feature)
                            <span class="px-3 py-1 bg-gray-50 text-gray-600 text-xs font-bold rounded border border-gray-200">{{ $feature }}</span>
                            @endforeach
                        </div>
                    </div>

                    {{-- 4. INSPEKSI 175 TITIK --}}
                    <div id="inspeksi" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden scroll-mt-36">
                        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white flex justify-between items-center">
                            <div>
                                <h3 class="text-xl font-bold text-brand-dark">Laporan Inspeksi</h3>
                                <p class="text-xs text-gray-500 mt-1">Lulus 175 titik pengecekan standar CarTukar.</p>
                            </div>
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-6 border-b md:border-b-0 md:border-r border-gray-100">
                                <h4 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-green-500"></span> Eksterior
                                </h4>
                                <ul class="space-y-3 text-sm text-gray-600">
                                    <li class="flex justify-between"><span>Kaca Depan</span> <span class="text-green-600 font-bold">✓ Oke</span></li>
                                    <li class="flex justify-between"><span>Cat Body</span> <span class="text-green-600 font-bold">✓ Mulus</span></li>
                                    <li class="flex justify-between"><span>Ban & Velg</span> <span class="text-green-600 font-bold">✓ Tebal</span></li>
                                    <li class="flex justify-between"><span>Lampu-lampu</span> <span class="text-green-600 font-bold">✓ Oke</span></li>
                                </ul>
                            </div>
                            <div class="p-6">
                                <h4 class="font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span> Mesin & Interior
                                </h4>
                                <ul class="space-y-3 text-sm text-gray-600">
                                    <li class="flex justify-between"><span>Suara Mesin</span> <span class="text-green-600 font-bold">✓ Halus</span></li>
                                    <li class="flex justify-between"><span>AC Dingin</span> <span class="text-green-600 font-bold">✓ Oke</span></li>
                                    <li class="flex justify-between"><span>Tidak Ada Rembes</span> <span class="text-green-600 font-bold">✓ Kering</span></li>
                                    <li class="flex justify-between"><span>Kelistrikan</span> <span class="text-green-600 font-bold">✓ Normal</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- 5. CATATAN TEKNISI --}}
                    <div id="teknisi" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8 scroll-mt-36">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden border-2 border-white shadow-md">
                                    <img src="https://ui-avatars.com/api/?name=Teknisi+Ahli&background=0F172A&color=fff" alt="Teknisi">
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-brand-dark">Catatan Inspektor</h3>
                                <p class="text-xs text-gray-500 mb-3">Diinspeksi oleh Budi Santoso (Certified Mechanic)</p>

                                <div class="bg-yellow-50 rounded-xl p-4 text-sm text-gray-700 italic border-l-4 border-brand-yellow leading-relaxed">
                                    "Unit ini dalam kondisi sangat prima. Mesin sangat responsif, perpindahan gigi halus. Kaki-kaki senyap saat melewati jalan rusak. Interior bersih bebas bau rokok. Sangat direkomendasikan untuk pemakaian jangka panjang."
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 6. RIWAYAT SERVIS (TIMELINE) --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-8">
                        <h3 class="text-xl font-bold text-brand-dark mb-6">Riwayat Kendaraan</h3>
                        <div class="relative border-l-2 border-gray-200 ml-3 space-y-8">
                            <div class="relative pl-8">
                                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-brand-yellow border-4 border-white shadow-sm"></div>
                                <h4 class="font-bold text-gray-800 text-sm">Inspeksi CarTukar</h4>
                                <p class="text-xs text-gray-400">Hari Ini</p>
                                <p class="text-sm text-gray-600 mt-1">Lulus inspeksi 175 titik & detailing premium.</p>
                            </div>
                            <div class="relative pl-8">
                                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-gray-300 border-4 border-white"></div>
                                <h4 class="font-bold text-gray-800 text-sm">Perpanjangan Pajak</h4>
                                <p class="text-xs text-gray-400">6 Bulan Lalu</p>
                                <p class="text-sm text-gray-600 mt-1">Pajak tahunan diperpanjang, dokumen valid.</p>
                            </div>
                            <div class="relative pl-8">
                                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-gray-300 border-4 border-white"></div>
                                <h4 class="font-bold text-gray-800 text-sm">Service Berkala</h4>
                                <p class="text-xs text-gray-400">1 Tahun Lalu</p>
                                <p class="text-sm text-gray-600 mt-1">Ganti oli & tune up di bengkel resmi.</p>
                            </div>
                        </div>
                    </div>

                    {{-- 7. SIMULASI KREDIT --}}
                    <div id="kredit" class="bg-brand-dark rounded-2xl p-8 text-white relative overflow-hidden scroll-mt-36">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-brand-yellow/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>

                        <h3 class="text-xl font-bold mb-6 relative z-10">Estimasi Kredit</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative z-10">
                            <div class="bg-white/10 border border-white/10 p-4 rounded-xl backdrop-blur-sm">
                                <p class="text-xs text-gray-400 mb-1">Total DP (20%)</p>
                                <p class="text-xl font-bold text-white">Rp {{ number_format($dpAmount, 0, ',', '.') }}</p>
                            </div>
                            <div class="bg-white/10 border border-white/10 p-4 rounded-xl backdrop-blur-sm">
                                <p class="text-xs text-gray-400 mb-1">Cicilan / Bulan</p>
                                <p class="text-xl font-bold text-brand-yellow">Rp {{ number_format($monthlyInstallment, 0, ',', '.') }}</p>
                            </div>
                            <div class="bg-white/10 border border-white/10 p-4 rounded-xl backdrop-blur-sm">
                                <p class="text-xs text-gray-400 mb-1">Tenor</p>
                                <p class="text-xl font-bold text-white">5 Tahun</p>
                            </div>
                        </div>
                        <p class="text-[10px] text-gray-500 mt-4 relative z-10">*Perhitungan hanya simulasi. Angka final ditentukan oleh pihak leasing.</p>
                    </div>

                </div>

                {{-- KOLOM KANAN (SIDEBAR STICKY) --}}
                <div class="lg:col-span-4">
                    <div class="sticky top-24 space-y-6">

                        {{-- CARD HARGA & CTA --}}
                        <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 overflow-hidden relative">
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-brand-yellow to-brand-dark"></div>

                            <div class="mb-6">
                                <h1 class="text-2xl font-black text-brand-dark leading-tight mb-2">{{ $car->brand }} {{ $car->model }}</h1>
                                <p class="text-sm text-gray-500">{{ $car->year }} • {{ $car->transmission }}</p>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-4 mb-6 border border-gray-200">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Harga Tunai</p>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-sm font-bold text-brand-dark">Rp</span>
                                    <h2 class="text-3xl font-black text-brand-dark tracking-tight">{{ $priceFormatted }}</h2>
                                </div>
                            </div>

                            <div class="space-y-3">
                                {{-- Tombol WA --}}
                                <a href="{{ $waLink }}" target="_blank" class="w-full bg-[#25D366] hover:bg-[#20b858] text-white font-bold py-4 rounded-xl shadow-lg shadow-green-500/20 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 group">
                                    <svg class="w-5 h-5 fill-current group-hover:scale-110 transition" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                                    </svg>
                                    Chat WhatsApp
                                </a>

                                <button class="w-full bg-white border-2 border-gray-200 text-gray-700 font-bold py-3.5 rounded-xl hover:border-brand-dark hover:text-brand-dark transition flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Jadwal Test Drive
                                </button>
                            </div>
                        </div>

                        {{-- CARD LOKASI --}}
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-xl">📍</div>
                            <div>
                                <p class="text-sm font-bold text-brand-dark">CarTukar {{ $car->location ?? 'Jakarta' }}</p>
                                <p class="text-xs text-green-600 font-medium flex items-center gap-1">
                                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> Buka Sekarang
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- FIXED BOTTOM BAR (MOBILE ONLY) --}}
    <div class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-4 lg:hidden z-50 flex items-center justify-between shadow-[0_-4px_10px_rgba(0,0,0,0.05)]">
        <div>
            <p class="text-[10px] text-gray-500 font-bold uppercase">Harga Tunai</p>
            <p class="font-bold text-brand-dark text-lg">Rp {{ $priceFormatted }}</p>
        </div>
        <a href="{{ $waLink }}" class="bg-[#25D366] text-white px-6 py-3 rounded-lg font-bold shadow-lg flex items-center gap-2">
            Hubungi
        </a>
    </div>

    {{--
        ===============================================================
        SCRIPT JAVASCRIPT
        ===============================================================
    --}}
    <script>
        function carDetail() {
            return {
                // Inisialisasi gambar dari variabel PHP yang sudah AMAN (processedImage / mainImage)
                activeImage: '{{ $mainImage }}',
                activeSection: 'spesifikasi',

                scrollTo(id) {
                    const el = document.getElementById(id);
                    if (el) {
                        const offset = 100;
                        const top = el.getBoundingClientRect().top + window.scrollY - offset;
                        window.scrollTo({
                            top: top,
                            behavior: 'smooth'
                        });
                        this.activeSection = id;
                    }
                }
            }
        }
    </script>
</x-app>