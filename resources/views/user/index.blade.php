 @extends('layouts.app')

@section('title', 'WebGIS PKH & BPNT Kota Palopo')

@section('content')
 
 
 <!-- ============================================== -->
        <!-- TAB: BERANDA                                   -->
        <!-- ============================================== -->
        <section id="tab-beranda" class="tab-section block">

            <!-- MODERN SLIDER / HERO SECTION -->
            <div class="relative overflow-hidden bg-slate-950 text-white h-[500px] flex items-center">
                <!-- Background slides (controlled via JS for automatic transitions) -->
                <div id="carousel-slides" class="absolute inset-0 z-0">
                    <!-- Slide 1 -->
                    <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 bg-cover bg-center" style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.5)), url('https://pbs.twimg.com/media/D8rJr77U8AY6qRT.jpg');"></div>
                    <!-- Slide 2 -->
                    <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 bg-cover bg-center" style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.5)), url('https://luwuraya.teraskata.com/wp-content/uploads/2024/12/Kantor-Walikota-Palopo.jpg');"></div>
                </div>

                <!-- Gradient Overlay & Floating Grid Elements -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80 z-10"></div>
                
                <!-- Hero Content -->
                <div class="relative max-w-7xl mx-auto px-6 md:px-12 z-20 w-full flex flex-col items-start">
                    <span class="bg-emerald-500/25 border border-emerald-400/40 text-emerald-300 font-semibold text-xs uppercase px-3 py-1.5 rounded-full mb-4 tracking-widest animate-pulse flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Inovasi Pelayanan Spasial
                    </span>
                    <h2 class="text-3xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight max-w-3xl">
                        Sistem Penerima Bantuan <br>
                        <span class="bg-gradient-to-r from-emerald-400 via-teal-300 to-amber-300 bg-clip-text text-transparent">PKH dan BPNT</span> Kota Palopo
                    </h2>
                    <p class="mt-4 text-slate-300 max-w-2xl text-base md:text-lg leading-relaxed">
                        Platform WebGIS interaktif berbasis spasial untuk memetakan, memvalidasi, dan mengawasi distribusi bantuan Program Keluarga Harapan (PKH) serta Bantuan Pangan Non Tunai (BPNT) di 9 Kecamatan se-Kota Palopo secara akurat dan transparan.
                    </p>
                    <div class="mt-8 flex flex-wrap mb-10 gap-4">
                        <a href="{{ route('user.kemiskinan') }}" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-6 py-3.5 rounded-xl shadow-lg shadow-emerald-900/30 hover:shadow-emerald-700/50 hover:scale-[1.02] transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-map-location-dot"></i> Lihat Peta Interaktif
                        </a>
                        <a href="{{ route('user.penerima') }}" class="bg-slate-800/80 hover:bg-slate-700/90 border border-slate-700 text-slate-100 font-semibold px-6 py-3.5 rounded-xl backdrop-blur-sm hover:scale-[1.02] transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-table-list"></i> Cari Data Penerima
                        </a>
                    </div>
                </div>

                <!-- Slide Navigation Dots -->
                <div class="absolute bottom-6 right-6 md:right-12 z-30 flex items-center gap-2">
                    <a href="{{ route('user.kemiskinan') }}" class="w-3 h-3 rounded-full bg-emerald-500 transition-all duration-300"></a>
                    <a href="{{ route('user.penerima') }}" class="w-3 h-3 rounded-full bg-slate-600 hover:bg-emerald-400 transition-all duration-300"></a>
                </div>
            </div>

            <!-- QUICK DASHBOARD STATS -->
            <div class="max-w-7xl mx-auto px-4 md:px-8 -mt-16 relative z-30 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Stat Card 1 -->
<div class="glass-card rounded-2xl p-6 shadow-xl border-l-4 border-emerald-500 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between">

    <div>
        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">
            Penerima PKH Aktif
        </p>

        <h3 class="text-3xl font-extrabold text-slate-800 count-up"
            data-target="{{ $totalPKH }}">
            0
        </h3>

        <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
            <i class="fa-solid fa-arrow-trend-up text-emerald-500"></i>
            Terverifikasi DTKS
        </p>
    </div>

    <div class="p-4 bg-emerald-100 rounded-2xl text-emerald-700 shadow-inner">
        <i class="fa-solid fa-hands-holding text-2xl"></i>
    </div>

</div>
                    <!-- Stat Card 2 -->
 <!-- Stat Card 2 -->
<div class="glass-card rounded-2xl p-6 shadow-xl border-l-4 border-amber-500 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between">

    <div>
        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">
            Penerima BPNT Aktif
        </p>

        <h3 class="text-3xl font-extrabold text-slate-800 count-up"
            data-target="{{ $totalBPNT }}">
            0
        </h3>

        <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
            <i class="fa-solid fa-check text-emerald-500"></i>
            Penyaluran Tepat Sasaran
        </p>
    </div>

    <div class="p-4 bg-amber-100 rounded-2xl text-amber-700 shadow-inner">
        <i class="fa-solid fa-cart-shopping text-2xl"></i>
    </div>

</div>
                    <!-- Stat Card 3 -->
                    <div class="glass-card rounded-2xl p-6 shadow-xl border-l-4 border-sky-500 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Wilayah Coverage</p>
                            <h3 class="text-3xl font-extrabold text-slate-800">9 <span class="text-sm font-semibold text-slate-400">Kecamatan</span></h3>
                            <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                                <i class="fa-solid fa-globe text-sky-500"></i> Terpetakan 100% Spasial
                            </p>
                        </div>
                        <div class="p-4 bg-sky-100 rounded-2xl text-sky-700 shadow-inner">
                            <i class="fa-solid fa-location-crosshairs text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- HOME CONTENT DETAILS & PROCEDURES -->
            <div class="max-w-7xl mx-auto px-4 md:px-8 mb-16 grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Info Left (Main Information) -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
                        <h3 class="text-xl md:text-2xl font-bold text-slate-800 flex items-center gap-2 mb-4">
                            <span class="w-1.5 h-6 bg-brand-700 rounded-full inline-block"></span>
                            Tentang Sistem Bantuan Spasial Kota Palopo
                        </h3>
                        <p class="text-slate-600 leading-relaxed mb-4">
                            Sistem Informasi Geografis (WebGIS) Penerima Bantuan PKH dan BPNT ini merupakan inisiatif digital dari Pemerintah Kota Palopo untuk mengintegrasikan data sosial kependudukan dengan sebaran spasial lokasi hunian.
                        </p>
                        <p class="text-slate-600 leading-relaxed mb-6">
                            Melalui pendekatan GIS (Geographic Information System), kami berharap proses verifikasi kelaikan penerima bantuan sosial dapat dipantau langsung melalui peta kerentanan sosial, guna meminimalisir kesalahan sasaran (inclusion/exclusion error).
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-500 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-slate-700 text-sm">Validasi Berbasis Koordinat</h4>
                                    <p class="text-xs text-slate-500 mt-1">Titik hunian KPM ditandai secara tepat di peta satelit.</p>
                                </div>
                            </div>
                            <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-500 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-slate-700 text-sm">Visualisasi Tematik Modern</h4>
                                    <p class="text-xs text-slate-500 mt-1">Grafik interaktif untuk mengamati klaster kemiskinan per kelurahan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Flow of Service Card -->
                    <div class="bg-gradient-to-br from-brand-900 to-emerald-800 text-white rounded-2xl p-8 shadow-xl relative overflow-hidden">
                        <!-- BG Circles -->
                        <div class="absolute right-0 bottom-0 w-64 h-64 bg-white/5 rounded-full transform translate-x-12 translate-y-12"></div>
                        <div class="relative z-10">
                            <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                                <i class="fa-solid fa-circle-info text-accent"></i> Alur Pemetaan Penerima Bantuan
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="bg-white/10 p-4 rounded-xl border border-white/10">
                                    <span class="text-xs font-bold text-accent">01</span>
                                    <h4 class="font-bold text-sm mt-1">Verifikasi DTKS</h4>
                                    <p class="text-[11px] text-emerald-100 mt-1">Pencocokan data dasar kependudukan di Kementerian Sosial.</p>
                                </div>
                                <div class="bg-white/10 p-4 rounded-xl border border-white/10">
                                    <span class="text-xs font-bold text-accent">02</span>
                                    <h4 class="font-bold text-sm mt-1">Tagging Spasial</h4>
                                    <p class="text-[11px] text-emerald-100 mt-1">Petugas lapangan melakukan geotagging titik rumah KPM.</p>
                                </div>
                                <div class="bg-white/10 p-4 rounded-xl border border-white/10">
                                    <span class="text-xs font-bold text-accent">03</span>
                                    <h4 class="font-bold text-sm mt-1">Analisis GIS</h4>
                                    <p class="text-[11px] text-emerald-100 mt-1">Sistem menganalisis tingkat kemiskinan spasial.</p>
                                </div>
                                <div class="bg-white/10 p-4 rounded-xl border border-white/10">
                                    <span class="text-xs font-bold text-accent">04</span>
                                    <h4 class="font-bold text-sm mt-1">Penyaluran</h4>
                                    <p class="text-[11px] text-emerald-100 mt-1">Validasi penerima selesai, penyaluran aman & terpantau.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Right (Latest News / Updates) -->
                <div class="space-y-6">
                    <!-- <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-bullhorn text-amber-500"></i> Informasi & Berita Terbaru
                        </h3>
                        <div class="space-y-4">
                            <div class="border-b border-slate-100 pb-4 last:border-b-0 last:pb-0">
                                <span class="text-[10px] bg-amber-100 text-amber-800 font-bold px-2 py-0.5 rounded">Pengumuman</span>
                                <h4 class="font-bold text-sm text-slate-700 mt-1 hover:text-brand-600 cursor-pointer">Pembaruan Titik Geospasial KPM Palopo Tahap II</h4>
                                <p class="text-xs text-slate-400 mt-1">Dinas Sosial mengagendakan survei geotagging lapangan bagi KPM baru di Wara dan Telluwanua.</p>
                            </div>
                            <div class="border-b border-slate-100 pb-4 last:border-b-0 last:pb-0">
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded">Rilis Sistem</span>
                                <h4 class="font-bold text-sm text-slate-700 mt-1 hover:text-brand-600 cursor-pointer">Integrasi Peta Kemiskinan Terpadu 2026</h4>
                                <p class="text-xs text-slate-400 mt-1">Peta indikatif kemiskinan wilayah Kelurahan kini dapat diakses di menu visualisasi.</p>
                            </div>
                        </div>
                    </div> -->

                    <!-- Contact Center Card -->
                    <div class="bg-slate-900 text-white rounded-2xl p-6 shadow-sm relative overflow-hidden">
                        <h3 class="text-lg font-bold mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-headset text-brand-400"></i> Pusat Bantuan & Pengaduan
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">
                            Jika terdapat perbedaan data spasial atau adanya KPM yang tidak layak menerima, silakan kirimkan laporan Anda.
                        </p>
                        <button onclick="switchTab('laporan')" class="w-full bg-brand-600 hover:bg-brand-500 text-white font-bold text-xs py-3 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 shadow-lg shadow-brand-900/40">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Laporan Pengaduan
                        </button>
                    </div>
                </div>
            </div>
        </section>


@endsection
