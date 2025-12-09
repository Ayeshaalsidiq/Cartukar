<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'CarTukar - Showroom Mobil Bekas Digital' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/logo-ct.png') }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    },
                    colors: {
                        brand: {
                            yellow: '#FACC15',
                            dark: '#0F172A',
                            gray: '#334155',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 text-brand-dark antialiased flex flex-col min-h-screen"
    x-data="{ 
          authOpen: {{ $errors->any() ? 'true' : 'false' }}, 
          authMode: '{{ old('name') ? 'register' : 'login' }}',
          mobileMenuOpen: false 
      }">

    <x-auth-modal />

    {{-- NAVBAR SECTION --}}
    <nav class="bg-brand-dark text-white sticky top-0 z-50 border-b border-gray-800 shadow-lg transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                {{-- LOGO --}}
                <a href="/" class="flex items-center gap-1 group">
                    <span class="text-2xl font-black tracking-tighter text-white group-hover:text-gray-100 transition">
                        Car<span class="text-brand-yellow">Tukar</span>
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow mt-3 animate-pulse"></span>
                </a>

                {{-- MENU DESKTOP --}}
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('cars.index') }}" class="text-sm font-medium text-gray-300 hover:text-brand-yellow transition duration-200 {{ request()->routeIs('cars.index') ? 'text-brand-yellow' : '' }}">Beli Mobil</a>
                    <a href="#" class="text-sm font-medium text-gray-300 hover:text-brand-yellow transition duration-200">Jual Mobil</a>
                    <a href="#" class="text-sm font-medium text-gray-300 hover:text-brand-yellow transition duration-200">Tukar Tambah</a>
                    <a href="#" class="text-sm font-medium text-gray-300 hover:text-brand-yellow transition duration-200">Inspeksi</a>
                </div>

                {{-- TOMBOL AUTH (KANAN) --}}
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 text-white hover:text-brand-yellow transition focus:outline-none">
                            <span class="font-bold text-sm">Halo, {{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        {{-- DROPDOWN MENU --}}
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl py-2 z-50 text-gray-800 border border-gray-100 origin-top-right" x-cloak>

                            {{-- LOGIKA PENGECEKAN ROLE DISINI --}}
                            @if(Auth::user()->role === 'admin')
                            {{-- Menu Khusus Admin --}}
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-50 hover:text-brand-yellow text-sm font-bold text-brand-dark transition">
                                Dashboard Admin
                            </a>
                            @else
                            {{-- Menu Khusus User Biasa --}}
                            <a href="#" class="block px-4 py-2 hover:bg-gray-50 hover:text-brand-yellow text-sm font-medium transition">
                                Profil Saya
                            </a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-50 hover:text-brand-yellow text-sm font-medium transition">
                                Favorit
                            </a>
                            @endif

                            <div class="border-t border-gray-100 my-1"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="w-full text-left px-4 py-2 hover:bg-red-50 text-red-600 font-bold text-sm transition">Keluar</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <button @click="authOpen = true; authMode = 'login'" class="text-sm font-bold text-white hover:text-brand-yellow transition">
                        Masuk
                    </button>
                    <button @click="authOpen = true; authMode = 'register'" class="px-5 py-2.5 bg-brand-yellow text-brand-dark font-bold rounded-full hover:bg-yellow-400 transition shadow-lg shadow-yellow-500/20 text-sm transform hover:-translate-y-0.5">
                        Daftar
                    </button>
                    @endauth
                </div>

                {{-- Hamburger Mobile --}}
                <div class="flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-300 hover:text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" class="md:hidden bg-gray-900 border-t border-gray-800" x-cloak>
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="{{ route('cars.index') }}" class="block px-3 py-3 font-medium text-gray-300 hover:text-brand-yellow">Beli Mobil</a>
                <a href="#" class="block px-3 py-3 font-medium text-gray-300 hover:text-brand-yellow">Jual Mobil</a>

                <div class="pt-4 mt-4 border-t border-gray-800">
                    @auth
                    <div class="px-3 text-white font-bold mb-2">Halo, {{ Auth::user()->name }}</div>

                    {{-- LOGIKA ROLE DI MOBILE --}}
                    @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block w-full text-center px-4 py-3 bg-gray-800 text-brand-yellow font-bold rounded-lg hover:bg-gray-700 transition mb-2">
                        Dashboard Admin
                    </a>
                    @else
                    <a href="#" class="block w-full text-center px-4 py-3 bg-gray-800 text-gray-300 font-bold rounded-lg hover:bg-gray-700 transition mb-2">
                        Profil Saya
                    </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="block w-full text-center px-4 py-3 bg-red-900/30 text-red-400 font-bold rounded-lg border border-red-900/50">Keluar</button>
                    </form>
                    @else
                    <button @click="authOpen = true; authMode = 'register'; mobileMenuOpen = false" class="block w-full text-center px-4 py-3 bg-brand-yellow text-brand-dark font-bold rounded-lg mb-2">Daftar Sekarang</button>
                    <button @click="authOpen = true; authMode = 'login'; mobileMenuOpen = false" class="block w-full text-center px-4 py-3 text-gray-300 font-bold">Masuk Akun</button>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <footer class="bg-brand-dark text-white pt-20 pb-10 border-t-4 border-brand-yellow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div class="space-y-6">
                    <a href="/" class="inline-flex items-center gap-1 group">
                        <span class="text-3xl font-black tracking-tighter text-white group-hover:text-gray-100 transition">
                            Car<span class="text-brand-yellow">Tukar</span>
                        </span>
                        <span class="w-2 h-2 rounded-full bg-brand-yellow mt-3"></span>
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Showroom digital terbesar dengan ekosistem jual beli mobil bekas terintegrasi. Aman, Cepat, dan Transparan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-brand-yellow hover:text-brand-dark transition-all duration-300 transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-brand-yellow hover:text-brand-dark transition-all duration-300 transform hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- LINKS GROUP 1 --}}
                <div>
                    <h4 class="text-lg font-bold mb-6 text-brand-yellow border-b border-gray-800 pb-2 inline-block">Layanan Kami</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Beli Mobil Bekas</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Jual Mobil Instan</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Tukar Tambah</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Layanan Inspeksi</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Simulasi Kredit</a></li>
                    </ul>
                </div>

                {{-- LINKS GROUP 2 --}}
                <div>
                    <h4 class="text-lg font-bold mb-6 text-brand-yellow border-b border-gray-800 pb-2 inline-block">Perusahaan</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Karir</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Mitra Showroom</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Hubungi Kami</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-transform inline-block">Lokasi Cabang</a></li>
                    </ul>
                </div>

                {{-- NEWSLETTER --}}
                <div>
                    <h4 class="text-lg font-bold mb-6 text-brand-yellow border-b border-gray-800 pb-2 inline-block">Berlangganan</h4>
                    <p class="text-gray-400 text-sm mb-4">Dapatkan info stok mobil impian & promo terbaru.</p>
                    <form class="flex flex-col gap-3">
                        <input type="email" placeholder="Email Anda" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-sm text-white focus:outline-none focus:ring-2 focus:ring-brand-yellow focus:border-transparent transition">
                        <button class="w-full py-3 bg-brand-yellow text-brand-dark font-bold rounded-lg hover:bg-yellow-400 transition transform hover:-translate-y-0.5 shadow-lg">Langganan</button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm text-center md:text-left">&copy; 2025 CarTukar Indonesia. All rights reserved.</p>
                <div class="flex space-x-6 text-sm text-gray-500">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-white transition">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>