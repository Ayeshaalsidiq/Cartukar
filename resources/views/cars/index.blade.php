<x-app>
    <x-slot name="title">Cari Mobil Impian | CarTukar</x-slot>

    {{-- HEADER MINIMALIS --}}
    <div class="bg-white border-b border-gray-200 sticky top-20 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h1 class="text-xl font-bold text-brand-dark">Katalog Mobil Bekas</h1>
                    <p class="text-xs text-gray-500">Menampilkan <span class="font-bold">{{ $cars->total() }}</span> unit tersedia & terinspeksi.</p>
                </div>

                {{-- SORTING DROPDOWN (Mobile & Desktop) --}}
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500 hidden md:inline">Urutkan:</span>
                    <form id="sortForm" action="{{ route('cars.index') }}" method="GET">
                        {{-- Keep other filters when sorting --}}
                        @foreach(request()->except(['sort', 'page']) as $key => $value)
                        @if(is_array($value))
                        @foreach($value as $v) <input type="hidden" name="{{ $key }}[]" value="{{ $v }}"> @endforeach
                        @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                        @endforeach

                        <select name="sort" onchange="document.getElementById('sortForm').submit()" class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-brand-yellow focus:border-brand-yellow block p-2.5 outline-none font-semibold cursor-pointer">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Paling Baru</option>
                            <option value="lowest_price" {{ request('sort') == 'lowest_price' ? 'selected' : '' }}>Harga Terendah</option>
                            <option value="highest_price" {{ request('sort') == 'highest_price' ? 'selected' : '' }}>Harga Tertinggi</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-[#f8f9fa] min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                {{-- SIDEBAR FILTER (ACCORDION STYLE) --}}
                <aside class="w-full lg:w-1/4">
                    <form action="{{ route('cars.index') }}" method="GET">
                        {{-- Simpan sort saat filter --}}
                        <input type="hidden" name="sort" value="{{ request('sort') }}">

                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden sticky top-36">

                            {{-- Header Filter --}}
                            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-brand-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                    Filter Pencarian
                                </h3>
                                <a href="{{ route('cars.index') }}" class="text-xs text-red-500 font-bold hover:underline">Reset</a>
                            </div>

                            <div class="divide-y divide-gray-100 max-h-[70vh] overflow-y-auto custom-scrollbar">

                                {{-- 1. SEARCH --}}
                                <div class="p-5">
                                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari merk atau model..." class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-brand-yellow outline-none text-sm transition">
                                </div>

                                {{-- 2. LOCATION (NEW) --}}
                                <div x-data="{ open: true }" class="p-5">
                                    <button type="button" @click="open = !open" class="flex justify-between items-center w-full group">
                                        <span class="text-sm font-bold text-gray-700 uppercase tracking-wide">Lokasi</span>
                                        <svg class="w-4 h-4 text-gray-400 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-collapse class="mt-3 space-y-2">
                                        @foreach($locations as $loc)
                                        <label class="flex items-center gap-3 cursor-pointer group/item">
                                            <div class="relative flex items-center">
                                                <input type="checkbox" name="location[]" value="{{ $loc }}" {{ in_array($loc, request('location', [])) ? 'checked' : '' }} class="peer h-4 w-4 rounded border-gray-300 text-brand-yellow focus:ring-brand-yellow">
                                            </div>
                                            <span class="text-sm text-gray-600 group-hover/item:text-brand-dark transition">{{ $loc }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- 3. BRAND --}}
                                <div x-data="{ open: true }" class="p-5">
                                    <button type="button" @click="open = !open" class="flex justify-between items-center w-full">
                                        <span class="text-sm font-bold text-gray-700 uppercase tracking-wide">Merk Mobil</span>
                                        <svg class="w-4 h-4 text-gray-400 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-collapse class="mt-3 space-y-2">
                                        @foreach($brands as $brand)
                                        <label class="flex items-center gap-3 cursor-pointer group/item">
                                            <input type="checkbox" name="brand[]" value="{{ $brand }}" {{ in_array($brand, request('brand', [])) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-brand-yellow focus:ring-brand-yellow">
                                            <span class="text-sm text-gray-600 group-hover/item:text-brand-dark transition">{{ $brand }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- 4. BODY TYPE (NEW) --}}
                                <div x-data="{ open: false }" class="p-5">
                                    <button type="button" @click="open = !open" class="flex justify-between items-center w-full">
                                        <span class="text-sm font-bold text-gray-700 uppercase tracking-wide">Tipe Bodi</span>
                                        <svg class="w-4 h-4 text-gray-400 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-collapse class="mt-3 space-y-2">
                                        @foreach($bodyTypes as $type)
                                        <label class="flex items-center gap-3 cursor-pointer group/item">
                                            <input type="checkbox" name="body_type[]" value="{{ $type }}" {{ in_array($type, request('body_type', [])) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-brand-yellow focus:ring-brand-yellow">
                                            <span class="text-sm text-gray-600 group-hover/item:text-brand-dark transition">{{ $type }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- 5. HARGA --}}
                                <div x-data="{ open: true }" class="p-5">
                                    <button type="button" @click="open = !open" class="flex justify-between items-center w-full mb-3">
                                        <span class="text-sm font-bold text-gray-700 uppercase tracking-wide">Rentang Harga</span>
                                        <svg class="w-4 h-4 text-gray-400 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-collapse class="grid grid-cols-2 gap-2">
                                        <div class="relative">
                                            <span class="absolute left-3 top-2.5 text-xs text-gray-400">Rp</span>
                                            <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs outline-none focus:border-brand-yellow">
                                        </div>
                                        <div class="relative">
                                            <span class="absolute left-3 top-2.5 text-xs text-gray-400">Rp</span>
                                            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full pl-8 pr-2 py-2 bg-gray-50 border border-gray-200 rounded-lg text-xs outline-none focus:border-brand-yellow">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="p-5 bg-white border-t border-gray-100">
                                <button class="w-full py-3 bg-brand-dark text-white font-bold rounded-xl hover:bg-gray-800 transition shadow-lg shadow-gray-900/10 active:scale-95">
                                    Terapkan Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </aside>

                {{-- MAIN GRID --}}
                <main class="w-full lg:w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($cars as $car)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full">

                            {{-- Image Container --}}
                            <div class="relative h-56 bg-gray-200 overflow-hidden">
                                <img src="{{ Str::startsWith($car->image, '/storage') ? asset($car->image) : asset('storage/' . $car->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" alt="{{ $car->model }}">

                                {{-- Badges --}}
                                <div class="absolute top-3 left-3 flex gap-2">
                                    <span class="bg-brand-yellow text-brand-dark text-[10px] font-bold px-2 py-1 rounded shadow-sm">
                                        {{ $car->year }}
                                    </span>
                                    @if($car->mileage < 20000)
                                        <span class="bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm">
                                        Low KM
                                        </span>
                                        @endif
                                </div>

                                {{-- Location Badge (Bottom) --}}
                                <div class="absolute bottom-0 left-0 w-full p-3 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                                    <span class="text-white text-xs font-medium flex items-center gap-1">
                                        <svg class="w-3 h-3 text-brand-yellow" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $car->location ?? 'Jakarta Pusat' }}
                                    </span>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="p-5 flex-1 flex flex-col">
                                <a href="{{ route('cars.show', $car->id) }}" class="block mb-2">
                                    <h3 class="font-bold text-gray-900 text-lg leading-tight group-hover:text-brand-yellow transition line-clamp-2">
                                        {{ $car->brand }} {{ $car->model }}
                                    </h3>
                                </a>

                                {{-- Specs --}}
                                <div class="flex items-center gap-3 mb-4 text-xs text-gray-500 font-medium">
                                    <span class="flex items-center gap-1 bg-gray-50 px-2 py-1 rounded">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        {{ $car->transmission }}
                                    </span>
                                    <span class="flex items-center gap-1 bg-gray-50 px-2 py-1 rounded">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                        {{ number_format($car->mileage) }} km
                                    </span>
                                </div>

                                {{-- Price & Action --}}
                                <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                    <div>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Harga Tunai</p>
                                        <p class="text-xl font-black text-brand-dark">Rp {{ number_format($car->price / 1000000) }}<span class="text-sm font-bold text-gray-500">jt</span></p>
                                    </div>
                                    <a href="{{ route('cars.show', $car->id) }}" class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 group-hover:bg-brand-yellow group-hover:border-brand-yellow group-hover:text-brand-dark transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full py-16 text-center bg-white rounded-2xl border-2 border-dashed border-gray-200">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-1">Tidak ada hasil ditemukan</h3>
                            <p class="text-gray-500 text-sm mb-6">Coba ubah kata kunci atau kurangi filter Anda.</p>
                            <a href="{{ route('cars.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand-dark text-white rounded-lg font-bold hover:bg-gray-800 transition">
                                Reset Semua Filter
                            </a>
                        </div>
                        @endforelse
                    </div>

                    {{-- Pagination (Styled) --}}
                    <div class="mt-12">
                        {{ $cars->links() }}
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app>