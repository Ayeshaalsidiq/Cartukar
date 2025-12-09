{{-- Modal Container --}}
<div x-show="authOpen"
    class="fixed inset-0 z-[60] overflow-y-auto"
    role="dialog"
    aria-modal="true"
    x-cloak>

    {{-- 1. Backdrop Gelap (Blur) --}}
    <div x-show="authOpen"
        x-transition:enter="transition-opacity ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-brand-dark/90 backdrop-blur-sm transition-opacity"
        @click="authOpen = false"></div>

    {{-- 2. Modal Panel --}}
    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div x-show="authOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-8 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-8 scale-95"
            class="relative w-full max-w-md transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all">

            {{-- Close Button (X) --}}
            <button @click="authOpen = false" class="absolute top-5 right-5 text-gray-400 hover:text-brand-dark hover:bg-gray-100 rounded-full p-2 transition z-20">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            {{-- Header Title --}}
            <div class="pt-8 px-8 pb-4 text-center">
                <div class="w-12 h-12 bg-brand-yellow rounded-xl flex items-center justify-center text-brand-dark font-black text-xl mx-auto mb-4 shadow-lg shadow-brand-yellow/30">C</div>
                <h3 class="text-2xl font-black text-brand-dark" x-text="authMode === 'login' ? 'Selamat Datang!' : 'Buat Akun Baru'"></h3>
                <p class="text-sm text-gray-500 mt-1">Akses ribuan mobil impian dalam genggaman.</p>
            </div>

            <div class="px-8 pb-8">

                {{-- SOCIAL LOGIN BUTTONS --}}
                <div class="space-y-3">
                    {{-- Google --}}
                    <a href="#" class="flex items-center justify-center w-full px-4 py-3 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition gap-3 group shadow-sm">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5 group-hover:scale-110 transition">
                        <span class="font-bold text-gray-700 text-sm">Lanjut dengan Google</span>
                    </a>

                    {{-- WhatsApp (UI Only - Perlu Backend Integrasi) --}}
                    <button type="button" class="flex items-center justify-center w-full px-4 py-3 bg-[#f0fdf4] border border-[#dcfce7] rounded-xl hover:bg-[#dcfce7] transition gap-3 group">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-5 h-5 group-hover:scale-110 transition">
                        <span class="font-bold text-[#15803d] text-sm">Masuk via WhatsApp</span>
                    </button>
                </div>

                {{-- DIVIDER --}}
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-[10px] uppercase">
                        <span class="bg-white px-3 text-gray-400 font-bold tracking-widest">Atau Manual</span>
                    </div>
                </div>

                {{-- FORM LOGIN --}}
                <div x-show="authMode === 'login'" x-transition:enter="transition ease-out duration-300">
                    <form action="{{ route('login') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-yellow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input type="email" name="email" required class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-yellow focus:border-transparent outline-none transition text-sm font-medium text-brand-dark" placeholder="Email Anda">
                        </div>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-yellow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" name="password" required class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-yellow focus:border-transparent outline-none transition text-sm font-medium text-brand-dark" placeholder="Kata Sandi">
                        </div>

                        <div class="flex justify-end">
                            <a href="#" class="text-xs font-bold text-gray-400 hover:text-brand-dark transition">Lupa Password?</a>
                        </div>

                        <button type="submit" class="w-full py-3.5 bg-brand-dark text-white font-bold rounded-xl hover:bg-gray-800 transition shadow-lg shadow-gray-900/20 active:scale-[0.98]">
                            Masuk Sekarang
                        </button>
                    </form>

                    <p class="mt-6 text-center text-sm text-gray-500">
                        Belum punya akun?
                        <button @click="authMode = 'register'" class="text-brand-yellow font-bold hover:text-yellow-600 transition">Daftar Gratis</button>
                    </p>
                </div>

                {{-- FORM REGISTER --}}
                <div x-show="authMode === 'register'" x-transition:enter="transition ease-out duration-300" style="display: none;">
                    <form action="{{ route('register') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-yellow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" name="name" required class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-yellow focus:border-transparent outline-none transition text-sm font-medium text-brand-dark" placeholder="Nama Lengkap">
                        </div>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-yellow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input type="email" name="email" required class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-yellow focus:border-transparent outline-none transition text-sm font-medium text-brand-dark" placeholder="Email Aktif">
                        </div>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-yellow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" name="password" required class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-yellow focus:border-transparent outline-none transition text-sm font-medium text-brand-dark" placeholder="Buat Password">
                        </div>

                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-brand-yellow">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" required class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-brand-yellow focus:border-transparent outline-none transition text-sm font-medium text-brand-dark" placeholder="Ulangi Password">
                        </div>

                        <button type="submit" class="w-full py-3.5 bg-brand-yellow text-brand-dark font-bold rounded-xl hover:bg-yellow-400 transition shadow-lg shadow-brand-yellow/20 active:scale-[0.98]">
                            Daftar Akun
                        </button>
                    </form>

                    <p class="mt-6 text-center text-sm text-gray-500">
                        Sudah punya akun?
                        <button @click="authMode = 'login'" class="text-brand-dark font-bold hover:underline">Masuk di sini</button>
                    </p>
                </div>

            </div>

            {{-- Footer Note (Privacy) --}}
            <div class="bg-gray-50 p-4 text-center rounded-b-3xl border-t border-gray-100">
                <p class="text-[10px] text-gray-400 leading-tight">
                    Dengan masuk, Anda menyetujui <a href="#" class="underline hover:text-gray-600">Syarat & Ketentuan</a> serta <a href="#" class="underline hover:text-gray-600">Kebijakan Privasi</a> CarTukar.
                </p>
            </div>

        </div>
    </div>
</div>