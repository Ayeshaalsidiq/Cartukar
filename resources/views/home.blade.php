<x-app>
    @push('styles')
    <style>
        .text-stroke { -webkit-text-stroke: 1px rgba(255,255,255,0.1); color: transparent; }
        .bg-grid-pattern { background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px); background-size: 40px 40px; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Accordion Animation */
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
        details[open] summary ~ * { animation: sweep .5s ease-in-out; }
        @keyframes sweep { 0% { opacity: 0; transform: translateY(-10px); } 100% { opacity: 1; transform: translateY(0); } }
    </style>
    @endpush

    <x-slot name="title">CarTukar - The Premium Marketplace</x-slot>

    {{-- 1. HERO SECTION (CINEMATIC) --}}
    <div class="relative bg-[#0F172A] min-h-screen flex flex-col lg:flex-row overflow-hidden">
        <div class="w-full lg:w-[45%] relative z-20 flex flex-col justify-center px-6 sm:px-12 lg:pl-20 lg:pr-10 py-20 lg:py-0 bg-[#0F172A]">
            <div class="absolute inset-0 bg-grid-pattern opacity-20 pointer-events-none"></div>

            <div class="relative animate-fade-in-up">
                <div class="flex items-center gap-3 mb-8">
                    <span class="h-px w-12 bg-brand-yellow"></span>
                    <span class="text-brand-yellow font-bold uppercase tracking-[0.2em] text-xs">Premium Selection</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-black text-white leading-[0.9] tracking-tighter mb-8">
                    DRIVE <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-yellow to-yellow-200">BETTER.</span>
                </h1>

                <p class="text-slate-400 text-lg leading-relaxed max-w-md mb-10 border-l-2 border-slate-700 pl-6">
                    Platform jual beli mobil bekas terkurasi dengan standar inspeksi tertinggi. Transparansi total, tanpa kompromi.
                </p>

                <div class="flex gap-12 border-t border-slate-800 pt-8">
                    <div>
                        <p class="text-3xl font-black text-white">1.2k+</p>
                        <p class="text-xs text-slate-500 uppercase font-bold mt-1">Ready Stock</p>
                    </div>
                    <div>
                        <p class="text-3xl font-black text-white">100%</p>
                        <p class="text-xs text-slate-500 uppercase font-bold mt-1">Warranty</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[55%] relative h-[50vh] lg:h-auto bg-gray-900">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0F172A] to-transparent z-10 lg:w-32"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0F172A] via-transparent to-transparent z-10 lg:hidden"></div>
            <img src="https://images.unsplash.com/photo-1603584173870-7f23fdae1b7a?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover object-center" alt="Hero Car">
            
            <div class="absolute bottom-0 left-0 right-0 p-6 z-20 lg:bottom-12 lg:left-0 lg:right-auto lg:w-full lg:max-w-xl lg:-translate-x-12">
                <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-4 rounded-2xl shadow-2xl">
                    <form action="#" class="flex gap-2">
                        <div class="relative flex-grow">
                            <svg class="w-5 h-5 text-gray-400 absolute top-1/2 -translate-y-1/2 left-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            <input type="text" placeholder="Cari unit impian Anda..." class="w-full bg-black/20 border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-yellow focus:bg-black/40 transition">
                        </div>
                        <button class="bg-brand-yellow text-brand-dark font-bold px-6 rounded-xl hover:bg-white transition shadow-[0_0_20px_rgba(250,204,21,0.3)]">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. PARTNERS (REVISION: STATIC GRID UNTUK MENGHINDARI BROKEN LAYOUT) --}}
    <div class="bg-white border-b border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">Didukung Oleh Leasing & Partner Resmi</p>
            
            {{-- Menggunakan Grid System agar logo tidak menumpuk vertikal --}}
            <div class="grid grid-cols-3 md:grid-cols-6 gap-8 items-center justify-items-center">
                {{-- Logo Toyota --}}
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Toyota_carlogo.svg" 
                     class="h-8 md:h-10 w-auto object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Toyota">
                
                {{-- Logo Honda --}}
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Honda_Logo.svg" 
                     class="h-8 md:h-10 w-auto object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Honda">
                
                {{-- Logo BMW --}}
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/BMW.svg" 
                     class="h-8 md:h-10 w-auto object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="BMW">
                
                {{-- Logo Mercedes --}}
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/90/Mercedes-Logo.svg" 
                     class="h-8 md:h-10 w-auto object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Mercedes">
                
                {{-- Logo Mitsubishi --}}
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Mitsubishi_logo.svg" 
                     class="h-8 md:h-10 w-auto object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Mitsubishi">
                
                {{-- Logo Mazda --}}
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/Mazda_logo_with_emblem.svg" 
                     class="h-8 md:h-10 w-auto object-contain grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition duration-300" alt="Mazda">
            </div>
        </div>
    </div>

    {{-- 3. BENTO GRID FEATURES --}}
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center md:text-left">
                <h2 class="text-4xl font-black text-[#0F172A] mb-4">Why CarTukar?</h2>
                <p class="text-slate-500 max-w-xl mx-auto md:mx-0">Standar baru industri mobil bekas. Kami mengeliminasi risiko agar Anda bisa berkendara dengan tenang.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 grid-rows-2 gap-6 h-auto md:h-[600px]">
                <div class="md:col-span-1 md:row-span-2 bg-[#0F172A] rounded-3xl p-8 flex flex-col justify-between relative overflow-hidden group shadow-xl">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-brand-yellow rounded-full blur-[100px] opacity-10 group-hover:opacity-20 transition duration-500"></div>
                    <div>
                        <div class="w-12 h-12 bg-brand-yellow rounded-2xl flex items-center justify-center text-brand-dark mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">150+ Titik Inspeksi</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Setiap mobil melewati proses screening ketat. Mesin, transmisi, elektrikal, hingga kolong mobil kami cek detail.</p>
                    </div>
                    <div class="mt-8">
                        <div class="h-1 w-full bg-white/10 rounded-full overflow-hidden">
                            <div class="h-full bg-brand-yellow w-3/4"></div>
                        </div>
                        <p class="text-xs text-brand-yellow mt-2 font-mono">STANDAR KUALITAS TINGGI</p>
                    </div>
                </div>

                <div class="md:col-span-2 bg-white rounded-3xl p-8 flex items-center justify-between border border-gray-100 shadow-sm group hover:border-brand-yellow transition duration-300">
                    <div class="max-w-xs">
                        <h3 class="text-2xl font-bold text-[#0F172A] mb-2">Garansi Mesin 1 Tahun</h3>
                        <p class="text-slate-500 text-sm">Perlindungan menyeluruh untuk ketenangan pikiran Anda pasca pembelian via Partners.</p>
                    </div>
                    <div class="hidden md:block text-9xl font-black text-gray-100 select-none group-hover:text-brand-yellow/20 transition duration-300">1TH</div>
                </div>

                <div class="bg-brand-yellow rounded-3xl p-8 flex flex-col justify-center text-center group cursor-pointer hover:-translate-y-1 transition duration-300 shadow-lg shadow-yellow-500/20">
                    <h3 class="text-4xl font-black text-[#0F172A] mb-1 group-hover:scale-110 transition duration-300">1 Jam</h3>
                    <p class="text-[#0F172A] font-bold text-sm uppercase tracking-wider">Approval Kredit</p>
                </div>

                <div class="bg-white rounded-3xl p-8 flex flex-col justify-center border border-gray-100 shadow-sm group hover:bg-[#0F172A] hover:text-white transition duration-300">
                    <svg class="w-10 h-10 text-brand-dark mb-4 group-hover:text-brand-yellow transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
                    <h3 class="text-xl font-bold mb-1">Harga Transparan</h3>
                    <p class="text-sm text-gray-500 group-hover:text-slate-400">Tidak ada biaya tersembunyi.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. NEW SECTION: VALUE ADDED SERVICES --}}
    <section class="py-20 bg-white border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-brand-yellow font-bold uppercase tracking-wider text-xs">More Than Sales</span>
                <h2 class="text-3xl font-black text-[#0F172A] mt-2">Layanan Purna Jual</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg text-[#0F172A] mb-2">Car Detailing</h3>
                    <p class="text-sm text-gray-500">Setiap unit yang keluar dari showroom telah melalui proses detailing interior & eksterior tingkat lanjut.</p>
                </div>
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg text-[#0F172A] mb-2">Bantuan Pajak</h3>
                    <p class="text-sm text-gray-500">Lupa bayar pajak atau butuh balik nama? Tim biro jasa kami siap membantu pengurusan dokumen Anda.</p>
                </div>
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg text-[#0F172A] mb-2">Emergency Roadside</h3>
                    <p class="text-sm text-gray-500">Gratis layanan derek 24 jam untuk 6 bulan pertama khusus area Jabodetabek.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. INVENTORY SHOWCASE --}}
    <div class="bg-white pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16">
            <div class="flex flex-col md:flex-row justify-between items-end mb-10">
                <div>
                    <span class="text-brand-yellow font-bold uppercase tracking-wider text-xs">Fresh Stock</span>
                    <h2 class="text-3xl font-black text-[#0F172A] mt-2">Unit Pilihan Editor</h2>
                </div>
                <div class="flex gap-2 mt-4 md:mt-0 overflow-x-auto hide-scrollbar pb-2">
                    <button class="px-6 py-2 bg-[#0F172A] text-white rounded-full text-sm font-bold whitespace-nowrap">All Cars</button>
                    <button class="px-6 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-bold hover:bg-gray-200 whitespace-nowrap">SUV</button>
                    <button class="px-6 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-bold hover:bg-gray-200 whitespace-nowrap">Sedan</button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($cars as $car)
                
                {{-- PERBAIKAN LOGIKA GAMBAR DISINI --}}
                @php
                    $rawImage = $car->image;
                    $processedImage = \Illuminate\Support\Str::startsWith($rawImage, '/storage') 
                        ? asset($rawImage) 
                        : asset('storage/' . $rawImage);
                @endphp

                <div class="group relative bg-white border border-gray-100 rounded-2xl hover:shadow-xl transition-all duration-300">
                    <div class="aspect-[4/3] bg-gray-100 rounded-t-2xl overflow-hidden relative">
                        {{-- GUNAKAN $processedImage --}}
                        <img src="{{ $processedImage }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $car->model }}">
                        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider text-[#0F172A]">
                            {{ $car->badge ?? 'Available' }}
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-[#0F172A] group-hover:text-brand-yellow transition truncate">{{ $car->brand }} {{ $car->model }}</h3>
                        <div class="flex items-center gap-3 text-xs text-gray-500 my-2 font-medium">
                            <span>{{ $car->year }}</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>{{ $car->transmission }}</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>{{ number_format($car->mileage) }} km</span>
                        </div>
                        <div class="flex justify-between items-center mt-3 pt-3 border-t border-gray-100">
                            <p class="text-lg font-black text-[#0F172A]">Rp {{ number_format($car->price, 0, ',', '.') }}</p>
                            <a href="{{ route('cars.show', $car->id) }}" class="text-xs font-bold border-b border-brand-dark pb-0.5 hover:text-brand-yellow hover:border-brand-yellow transition">View Details</a>
                        </div>
                    </div>
                </div>
                @empty
                 <div class="col-span-full py-20 text-center border-2 border-dashed border-gray-200 rounded-3xl">
                    <p class="text-gray-400">Inventory update in progress.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('cars.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gray-50 text-[#0F172A] font-bold rounded-full hover:bg-brand-yellow transition duration-300">
                    Lihat Semua Katalog
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>
    </div>

    {{-- 6. NEW SECTION: DARK TESTIMONIALS (CONTRAST) --}}
    <section class="py-24 bg-[#0F172A] relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-5 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-3xl md:text-4xl font-black text-white text-center mb-16">Stories from the Road</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-3xl">
                    <div class="flex text-brand-yellow mb-4">★★★★★</div>
                    <p class="text-slate-300 mb-6 italic">"Awalnya skeptis beli mobil online. Tapi CarTukar memberikan transparansi luar biasa. Inspeksinya detail banget!"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-brand-yellow rounded-full flex items-center justify-center font-bold text-[#0F172A]">AD</div>
                        <div>
                            <p class="text-white font-bold text-sm">Aditya Dimas</p>
                            <p class="text-slate-500 text-xs">Membeli Pajero Sport</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-3xl">
                    <div class="flex text-brand-yellow mb-4">★★★★★</div>
                    <p class="text-slate-300 mb-6 italic">"Proses trade-in sangat fair. Harga mobil lama saya dihargai lebih tinggi dari dealer lain. Top recommended."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center font-bold text-[#0F172A]">SK</div>
                        <div>
                            <p class="text-white font-bold text-sm">Sarah Kusuma</p>
                            <p class="text-slate-500 text-xs">Trade-in Honda Jazz</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-3xl">
                    <div class="flex text-brand-yellow mb-4">★★★★★</div>
                    <p class="text-slate-300 mb-6 italic">"Tim sales sangat membantu pengurusan leasing sampai approval keluar dalam hitungan jam."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-brand-yellow rounded-full flex items-center justify-center font-bold text-[#0F172A]">RW</div>
                        <div>
                            <p class="text-white font-bold text-sm">Rendra Wijaya</p>
                            <p class="text-slate-500 text-xs">Membeli BMW X1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. NEW SECTION: FAQ (ACCORDION) --}}
    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl font-black text-[#0F172A] text-center mb-10">Frequently Asked Questions</h2>
            
            <div class="space-y-4">
                <details class="group bg-gray-50 p-6 rounded-2xl cursor-pointer">
                    <summary class="flex justify-between items-center font-bold text-[#0F172A] list-none">
                        Apakah mobil di CarTukar bebas banjir?
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <p class="text-gray-500 mt-4 text-sm leading-relaxed">
                        100%. Setiap unit melewati inspeksi 150 titik termasuk pengecekan kolong, interior, dan mesin untuk memastikan tidak ada jejak air atau lumpur sisa banjir. Kami berani memberikan garansi uang kembali.
                    </p>
                </details>

                <details class="group bg-gray-50 p-6 rounded-2xl cursor-pointer">
                    <summary class="flex justify-between items-center font-bold text-[#0F172A] list-none">
                        Bagaimana proses kredit di CarTukar?
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <p class="text-gray-500 mt-4 text-sm leading-relaxed">
                        Kami bekerjasama dengan leasing terkemuka (BCA Finance, Adira, dll). Anda cukup menyerahkan KTP, KK, dan Slip Gaji. Tim kami akan membantu proses pengajuan hingga approval, biasanya dalam 1-3 hari kerja.
                    </p>
                </details>
                
                <details class="group bg-gray-50 p-6 rounded-2xl cursor-pointer">
                    <summary class="flex justify-between items-center font-bold text-[#0F172A] list-none">
                        Bisakah tukar tambah mobil lama saya?
                        <span class="transition group-open:rotate-180">
                            <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                        </span>
                    </summary>
                    <p class="text-gray-500 mt-4 text-sm leading-relaxed">
                        Tentu! Kami menyediakan layanan Trade-In dengan harga kompetitif. Tim appraiser kami akan menginspeksi mobil lama Anda dan memberikan penawaran di tempat yang bisa langsung dijadikan DP.
                    </p>
                </details>
            </div>
        </div>
    </section>

    {{-- 8. CTA SECTION (TRADE IN) --}}
    <div class="bg-[#0F172A] overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="w-full md:w-1/2 py-20 pr-0 md:pr-12">
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-6">
                        Punya Mobil Lama? <br>
                        <span class="text-brand-yellow">Jadikan DP Aja.</span>
                    </h2>
                    <p class="text-slate-400 text-lg mb-8">
                        Jangan biarkan harga mobil lama Anda jatuh. Dapatkan penawaran *fair price* dari tim appraiser kami dalam 60 menit.
                    </p>
                    <div class="flex gap-4">
                        <button class="bg-brand-yellow text-[#0F172A] font-bold px-8 py-3 rounded-xl hover:bg-white transition shadow-lg shadow-yellow-500/20">Trade In Sekarang</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2 relative h-64 md:h-[500px]">
                     <div class="absolute inset-0 bg-gradient-to-t from-[#0F172A] via-transparent to-transparent z-10 md:hidden"></div>
                     <div class="absolute inset-0 bg-gradient-to-r from-[#0F172A] via-transparent to-transparent z-10 hidden md:block"></div>
                     <img src="https://images.unsplash.com/photo-1560958089-b8a1929cea89?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover" alt="Trade In">
                </div>
            </div>
        </div>
    </div>
</x-app>