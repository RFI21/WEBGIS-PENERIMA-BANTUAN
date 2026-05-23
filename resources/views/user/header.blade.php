    <!-- KOP / HEADER PEMKOT -->
    <header class="bg-white border-b-4 border-brand-700 py-4 px-6 md:px-12 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-4 text-center md:text-left">
                <!-- Custom SVG modern logo for Pemkot Palopo, ensuring robust rendering with clean vector graphics -->
                <div class="w-16 h-20 flex-shrink-0 flex items-center justify-center  from-brand-700 to-emerald-500  p-1">

                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Lambang_Kota_Palopo.png" alt="" srcset="">
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-brand-800 tracking-tight leading-none">PEMERINTAH KOTA PALOPO</h1>
                    <p class="text-xs md:text-sm font-semibold text-slate-500 tracking-wider mt-1 uppercase">Dinas Sosial Tenaga Kerja Dan Transmigrasi</p>
                    <p class="text-xs text-brand-600 font-medium mt-0.5">Sistem Informasi Geografis Penerima Bantuan PKH & BPNT</p>
                </div>
            </div>
            <!-- Live Clock & Quick Info Info -->
            <div class="hidden lg:flex flex-col items-end text-right bg-slate-50 border border-slate-100 p-3 rounded-xl shadow-inner">
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Waktu Wilayah</span>
                <span id="liveClock" class="text-base font-bold text-slate-700">WITA --:--:--</span>
                <span class="text-xs text-emerald-600 font-medium flex items-center gap-1.5 mt-0.5">
                    <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full inline-block animate-ping"></span> 
                    Server Terkoneksi & Aman
                </span>
            </div>
        </div>
    </header>

    <!-- NAVBAR (STICKY GLASSMORPHIC) -->
    <nav class="glass-nav text-white sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14">
                <!-- Desktop Nav Items -->
                <div class="hidden lg:flex items-center space-x-1 w-full justify-between">
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('user.index') }}" id="nav-beranda" class="nav-btn px-3 py-2 rounded-lg text-sm font-semibold transition-all duration-300 {{ request()->routeIs('user.index') ? 'bg-brand-800 text-white shadow-lg' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }}  flex items-center gap-1.5">
                            <i class="fa-solid fa-house"></i> Beranda
                        </a>
                        <a href="{{ route('user.profil') }}" class="nav-btn px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('user.profil') ? 'bg-brand-800 text-white shadow-lg' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }} transition-all duration-300 flex items-center gap-1.5">
                            <i class="fa-solid fa-building-ngo"></i> Profil
                        </a>
                        <a href="{{ route('user.kemiskinan') }}" class="nav-btn px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('user.kemiskinan') ? 'bg-brand-800 text-white shadow-lg' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }} transition-all duration-300 flex items-center gap-1.5">
                            <i class="fa-solid fa-map-location-dot"></i> Peta Kemiskinan
                        </a>
                        <!-- Peta Penerima Bantuan Dropdown -->
                        <div class="relative group inline-block">
                            <button class="px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('user.pkh') || request()->routeIs('user.bpnt') ? 'bg-brand-800 text-white shadow-lg' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }} transition-all duration-300 flex items-center gap-1.5 focus:outline-none">
                                <i class="fa-solid fa-earth-asia"></i> Peta Penerima Bantuan <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </button>
                            <div class="absolute left-0 mt-0 w-48 bg-white text-slate-800 rounded-xl shadow-xl py-2 border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                                <a href="{{ route('user.pkh') }}"  class="block px-4 py-2 text-sm font-medium hover:bg-emerald-50 hover:text-brand-700 transition-colors duration-200">
                                    <i class="fa-solid fa-hands-holding text-brand-600 mr-2"></i> Bantuan PKH
                                </a>
                                <a href="{{ route('user.bpnt') }}"  class="block px-4 py-2 text-sm font-medium hover:bg-emerald-50 hover:text-brand-700 transition-colors duration-200">
                                    <i class="fa-solid fa-cart-shopping text-brand-600 mr-2"></i> Bantuan BPNT
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('user.penerima') }}" class="nav-btn px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('user.penerima') ? 'bg-brand-800 text-white shadow-lg' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }} transition-all duration-300 flex items-center gap-1.5">
                            <i class="fa-solid fa-users-viewfinder"></i> Data Penerima
                        </a>
                        <a href="{{ route('user.bansos') }}" class="nav-btn px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('user.bansos') ? 'bg-brand-800 text-white shadow-lg' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }} transition-all duration-300 flex items-center gap-1.5">
                            <i class="fa-solid fa-chart-pie"></i> Data Rekapitulasi
                        </a>
                        <a href="{{ route('user.laporan') }}" class="nav-btn px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('user.laporan') ? 'bg-brand-800 text-white shadow-lg' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }} transition-all duration-300 flex items-center gap-1.5">
                            <i class="fa-solid fa-file-invoice"></i> Laporan
                        </a>
                    </div>
                    <!-- Right Login Button -->
                    <div>
                        <a href="{{ route('user.login') }}" class="bg-accent hover:bg-accent-hover text-slate-900 font-bold px-5 py-2 rounded-xl text-sm flex items-center gap-2 shadow-lg hover:shadow-accent/30 hover:scale-105 active:scale-95 transition-all duration-300">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center justify-between w-full lg:hidden">
                    <span class="font-extrabold tracking-wide text-white text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-map-location-dot"></i> WebGIS PALOPO
                    </span>
                    <button id="mobileMenuBtn" class="p-2 rounded-lg text-emerald-100 hover:bg-brand-800 hover:text-white focus:outline-none transition-colors duration-200">
                        <i id="burgerIcon" class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

 <!-- Mobile Menu Panel -->
<div id="mobileMenu"
    class="hidden lg:hidden bg-brand-900 border-t border-brand-800 px-4 py-4 space-y-2">

    <!-- BERANDA -->
    <a href="{{ route('user.index') }}"
    class="w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.index') ? 'bg-brand-800 text-white' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-house w-5"></i>
        Beranda

    </a>

    <!-- PROFIL -->
    <a href="{{ route('user.profil') }}"
    class="w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.profil') ? 'bg-brand-800 text-white' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-building-ngo w-5"></i>
        Profil

    </a>

    <!-- PETA KEMISKINAN -->
    <a href="{{ route('user.kemiskinan') }}"
    class="w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.kemiskinan') ? 'bg-brand-800 text-white' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-map-location-dot w-5"></i>
        Peta Kemiskinan

    </a>

    <!-- TITLE -->
    <div class="pt-3 pb-1 px-2">
        <p class="text-[11px] uppercase tracking-widest text-brand-300 font-bold">
            Peta Penerima Bantuan
        </p>
    </div>

    <!-- PKH -->
    <a href="{{ route('user.pkh') }}"
    class="ml-2 w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.pkh') ? 'bg-brand-800 text-white' : 'text-emerald-200 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-hands-holding w-5"></i>
        Bantuan PKH

    </a>

    <!-- BPNT -->
    <a href="{{ route('user.bpnt') }}"
    class="ml-2 w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.bpnt') ? 'bg-brand-800 text-white' : 'text-emerald-200 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-cart-shopping w-5"></i>
        Bantuan BPNT

    </a>

    <!-- DATA PENERIMA -->
    <a href="{{ route('user.penerima') }}"
    class="w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.penerima') ? 'bg-brand-800 text-white' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-users-viewfinder w-5"></i>
        Data Penerima

    </a>

    <!-- REKAP -->
    <a href="{{ route('user.bansos') }}"
    class="w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.bansos') ? 'bg-brand-800 text-white' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-chart-pie w-5"></i>
        Data Rekapitulasi

    </a>

    <!-- LAPORAN -->
    <a href="{{ route('user.laporan') }}"
    class="w-full text-left px-4 py-3 rounded-xl text-sm font-semibold
    {{ request()->routeIs('user.laporan') ? 'bg-brand-800 text-white' : 'text-emerald-100 hover:bg-brand-800 hover:text-white' }}
    flex items-center gap-3 transition-all duration-300">

        <i class="fa-solid fa-file-invoice w-5"></i>
        Laporan

    </a>

    <!-- LOGIN -->
    <div class="pt-4">

        <a href="{{ route('user.login') }}"
        class="w-full bg-accent hover:bg-accent-hover text-slate-900 font-bold px-4 py-3 rounded-2xl text-sm flex items-center justify-center gap-2 shadow-lg transition-all duration-300">

            <i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login

        </a>

    </div>

</div>
    </nav>