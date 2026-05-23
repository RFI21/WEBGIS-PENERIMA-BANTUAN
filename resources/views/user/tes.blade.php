<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem WebGIS Penerima Bantuan PKH & BPNT Kota Palopo</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            600: '#059669', // Emerald Green Utama Pemkot
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        },
                        accent: {
                            DEFAULT: '#f59e0b', // Gold / Amber
                            hover: '#d97706',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Leaflet CSS for WebGIS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    
    <!-- Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
    <!-- Chart.js for Data Visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        /* Glassmorphism Classes */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .glass-nav {
            background: rgba(4, 120, 87, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        /* Map Glow Pulse Animation */
        @keyframes pulse-glow {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; box-shadow: 0 0 15px rgba(5, 150, 105, 0.6); }
        }
        .pulse-marker {
            animation: pulse-glow 2s infinite;
        }
    </style>
</head>
<body class="text-slate-800 flex flex-col min-h-screen">

    @include('user.header')


    <!-- MAIN BODY SECTIONS (SPA LAYOUT) -->
    <div id="content-container" class="flex-grow">

        <!-- ============================================== -->
        <!-- TAB: BERANDA                                   -->
        <!-- ============================================== -->
        <section id="tab-beranda" class="tab-section block">

            <!-- MODERN SLIDER / HERO SECTION -->
            <div class="relative overflow-hidden bg-slate-950 text-white h-[500px] flex items-center">
                <!-- Background slides (controlled via JS for automatic transitions) -->
                <div id="carousel-slides" class="absolute inset-0 z-0">
                    <!-- Slide 1 -->
                    <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100 bg-cover bg-center" style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.5)), url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=1200&q=80');"></div>
                    <!-- Slide 2 -->
                    <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0 bg-cover bg-center" style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.5)), url('https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?auto=format&fit=crop&w=1200&q=80');"></div>
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
                        <button onclick="switchTab('peta-kemiskinan')" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-6 py-3.5 rounded-xl shadow-lg shadow-emerald-900/30 hover:shadow-emerald-700/50 hover:scale-[1.02] transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-map-location-dot"></i> Lihat Peta Interaktif
                        </button>
                        <button onclick="switchTab('data-penerima')" class="bg-slate-800/80 hover:bg-slate-700/90 border border-slate-700 text-slate-100 font-semibold px-6 py-3.5 rounded-xl backdrop-blur-sm hover:scale-[1.02] transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-table-list"></i> Cari Data Penerima
                        </button>
                    </div>
                </div>

                <!-- Slide Navigation Dots -->
                <div class="absolute bottom-6 right-6 md:right-12 z-30 flex items-center gap-2">
                    <button onclick="setSlide(0)" id="dot-0" class="w-3 h-3 rounded-full bg-emerald-500 transition-all duration-300"></button>
                    <button onclick="setSlide(1)" id="dot-1" class="w-3 h-3 rounded-full bg-slate-600 hover:bg-emerald-400 transition-all duration-300"></button>
                </div>
            </div>

            <!-- QUICK DASHBOARD STATS -->
            <div class="max-w-7xl mx-auto px-4 md:px-8 -mt-16 relative z-30 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Stat Card 1 -->
                    <div class="glass-card rounded-2xl p-6 shadow-xl border-l-4 border-emerald-500 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Penerima PKH Aktif</p>
                            <h3 class="text-3xl font-extrabold text-slate-800 count-up" data-target="4850">0</h3>
                            <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                                <i class="fa-solid fa-arrow-trend-up text-emerald-500"></i> Terverifikasi DTKS
                            </p>
                        </div>
                        <div class="p-4 bg-emerald-100 rounded-2xl text-emerald-700 shadow-inner">
                            <i class="fa-solid fa-hands-holding text-2xl"></i>
                        </div>
                    </div>
                    <!-- Stat Card 2 -->
                    <div class="glass-card rounded-2xl p-6 shadow-xl border-l-4 border-amber-500 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Penerima BPNT Aktif</p>
                            <h3 class="text-3xl font-extrabold text-slate-800 count-up" data-target="7210">0</h3>
                            <p class="text-xs text-slate-400 mt-2 flex items-center gap-1">
                                <i class="fa-solid fa-check text-emerald-500"></i> Penyaluran Tepat Sasaran
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

        <!-- ============================================== -->
        <!-- TAB: PROFIL                                    -->
        <!-- ============================================== -->
        <section id="tab-profil" class="tab-section hidden py-12 px-4 md:px-8 max-w-7xl mx-auto">
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-8">
                <div class="flex flex-col md:flex-row gap-8 items-center border-b border-slate-100 pb-8 mb-8">
                    <div class="w-32 h-40 bg-slate-100 rounded-2xl flex items-center justify-center p-3 flex-shrink-0 shadow-md">
                        <svg viewBox="0 0 100 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                            <path d="M50 10 L85 30 L85 85 L50 110 L15 85 L15 30 Z" fill="#047857" stroke="#ffffff" stroke-width="4"/>
                            <path d="M50 20 L75 35 L75 80 L50 100 L25 80 L25 35 Z" fill="#f59e0b"/>
                            <circle cx="50" cy="55" r="15" fill="#ffffff" stroke="#047857" stroke-width="3"/>
                            <polygon points="50,22 53,28 60,28 55,32 57,38 50,34 43,38 45,32 40,28 47,28" fill="#ffffff"/>
                        </svg>
                    </div>
                    <div class="text-center md:text-left">
                        <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800">Dinas Sosial Pemerintah Kota Palopo</h2>
                        <p class="text-emerald-700 font-semibold text-sm mt-1">Mewujudkan Transparansi, Akuntabilitas, dan Efektivitas Bantuan Sosial Mandiri Spasial</p>
                        <div class="flex flex-wrap justify-center md:justify-start gap-4 mt-4">
                            <span class="bg-slate-100 text-slate-600 text-xs px-3 py-1 rounded-full font-medium"><i class="fa-solid fa-map-pin mr-1.5 text-emerald-600"></i>Jl. Andi Djemma, Kota Palopo</span>
                            <span class="bg-slate-100 text-slate-600 text-xs px-3 py-1 rounded-full font-medium"><i class="fa-solid fa-envelope mr-1.5 text-emerald-600"></i>dinsos@palopokota.go.id</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-bullseye text-emerald-600"></i> Visi & Misi Dinas Sosial
                        </h3>
                        <p class="text-sm text-slate-600 leading-relaxed mb-3 font-semibold text-emerald-800">
                            "Mewujudkan jaminan sosial bagi keluarga prasejahtera Kota Palopo yang mandiri dan berdaya guna berbasis data akurat."
                        </p>
                        <ul class="space-y-3 text-xs text-slate-500">
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-circle-arrow-right text-emerald-600 mt-0.5"></i>
                                <span>Mengembangkan peta sebaran geospasial real-time guna akurasi perencanaan sosial.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-circle-arrow-right text-emerald-600 mt-0.5"></i>
                                <span>Meningkatkan efisiensi verifikasi lapangan melalui digitalisasi terpadu.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fa-solid fa-circle-arrow-right text-emerald-600 mt-0.5"></i>
                                <span>Memberikan jaminan kesejahteraan yang merata dan berkelanjutan bagi KPM.</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-circle-nodes text-emerald-600"></i> Arsitektur Sistem GIS
                        </h3>
                        <p class="text-xs text-slate-500 leading-relaxed mb-4">
                            Aplikasi WebGIS ini dirancang dengan standar arsitektur GIS modern yang ringan namun handal. Menggunakan Open-source map layer Leaflet, digabungkan dengan geoprocessing server guna menampilkan klaster spasial pemukiman prasejahtera.
                        </p>
                        <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-100 flex items-center gap-4">
                            <i class="fa-solid fa-server text-2xl text-emerald-600"></i>
                            <div>
                                <h4 class="font-bold text-emerald-800 text-sm">Teknologi Data Terpadu</h4>
                                <p class="text-[11px] text-emerald-700">Integrasi real-time basis data DTKS Palopo dengan Visual GeoJSON Web Server.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- TAB: PETA KEMISKINAN / PENERIMA (GIS VIEW)     -->
        <!-- ============================================== -->
        <section id="tab-map-viewer" class="tab-section hidden py-6 px-4 md:px-8 max-w-7xl mx-auto">
            
            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">
                <!-- Map Header Controls -->
                <div class="bg-brand-800 text-white p-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 id="map-title" class="text-lg font-bold flex items-center gap-2">
                            <i class="fa-solid fa-map-location-dot text-amber-300 animate-bounce"></i> Peta Kemiskinan Spasial Kota Palopo
                        </h2>
                        <p id="map-subtitle" class="text-xs text-emerald-100 mt-0.5">Analisis kepadatan keluarga prasejahtera berdasarkan sebaran data DTKS terbaru.</p>
                    </div>
                    <!-- Legend Quick Toggles -->
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="text-xs font-semibold mr-1 text-emerald-200">Filter Visual:</span>
                        <button onclick="filterMapMarkers('all')" class="bg-white/10 hover:bg-white/20 active:bg-white/30 text-white border border-white/20 px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-400"></span> Semua Bantuan
                        </button>
                        <button onclick="filterMapMarkers('pkh')" class="bg-emerald-600 hover:bg-emerald-500 text-white border border-emerald-400 px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5 shadow-md">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-300"></span> PKH Only
                        </button>
                        <button onclick="filterMapMarkers('bpnt')" class="bg-amber-600 hover:bg-amber-500 text-white border border-amber-400 px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5 shadow-md">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-300"></span> BPNT Only
                        </button>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row">
                    <!-- Leaflet Container -->
                    <div class="w-full lg:w-3/4 h-[550px] relative">
                        <div id="gisMap" class="w-full h-full bg-slate-100"></div>
                        <!-- Absolute Legend Floating inside Map -->
                        <div class="absolute bottom-4 left-4 z-[1000] bg-white/95 backdrop-blur-md p-4 rounded-xl shadow-lg text-xs border border-slate-200 space-y-2 max-w-xs">
                            <h4 class="font-bold text-slate-800 border-b border-slate-100 pb-1 mb-1 flex items-center gap-1.5">
                                <i class="fa-solid fa-legend"></i> Legenda Peta
                            </h4>
                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-600 inline-block border-2 border-white shadow"></span>
                                <span class="text-slate-600">Penerima Bantuan PKH (Hijau)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-amber-500 inline-block border-2 border-white shadow"></span>
                                <span class="text-slate-600">Penerima Bantuan BPNT (Amber)</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-sky-500 inline-block border-2 border-white shadow animate-ping"></span>
                                <span class="text-slate-600">Klaster Kepadatan Tinggi</span>
                            </div>
                            <p class="text-[9px] text-slate-400 italic pt-1 border-t border-slate-100">Klik titik marker pada peta untuk melihat detail keluarga penerima.</p>
                        </div>
                    </div>

                    <!-- Map Sidebar Info Panels -->
                    <div class="w-full lg:w-1/4 bg-slate-50 border-t lg:border-t-0 lg:border-l border-slate-200 p-6 flex flex-col justify-between">
                        <div class="space-y-6">
                            <div>
                                <h3 class="font-bold text-sm text-slate-700 uppercase tracking-wider mb-2">Informasi Spasial Terpilih</h3>
                                <div id="map-selected-info" class="p-4 bg-white rounded-xl border border-slate-200 space-y-2.5 shadow-sm">
                                    <p class="text-xs text-slate-400 italic">Silakan klik salah satu marker titik hunian di dalam peta untuk memuat informasi KPM terpilih.</p>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <h3 class="font-bold text-sm text-slate-700 uppercase tracking-wider">Kecamatan Coverage</h3>
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 cursor-pointer" onclick="zoomToSubdistrict('wara')">Wara</span>
                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 cursor-pointer" onclick="zoomToSubdistrict('bara')">Bara</span>
                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 cursor-pointer" onclick="zoomToSubdistrict('sendana')">Sendana</span>
                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 cursor-pointer" onclick="zoomToSubdistrict('wara-timur')">Wara Timur</span>
                                </div>
                            </div>
                        </div>

                        <!-- Reset View Map Control -->
                        <button onclick="resetMapView()" class="mt-6 w-full bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs py-3 rounded-xl transition-all flex items-center justify-center gap-1.5 shadow">
                            <i class="fa-solid fa-arrows-to-eye"></i> Reset Fokus Kota Palopo
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- TAB: DATA PENERIMA                             -->
        <!-- ============================================== -->
        <section id="tab-data-penerima" class="tab-section hidden py-12 px-4 md:px-8 max-w-7xl mx-auto">
            
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Database Keluarga Penerima Manfaat (KPM)</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Daftar lengkap warga terdaftar bantuan PKH dan BPNT di wilayah administratif Kota Palopo.</p>
                    </div>
                    <!-- Quick Actions -->
                    <div class="flex items-center gap-2">
                        <button onclick="downloadMockPDF()" class="bg-white hover:bg-slate-100 border border-slate-300 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs flex items-center gap-1.5 shadow-sm transition-all">
                            <i class="fa-solid fa-file-pdf text-red-600"></i> Ekspor PDF
                        </button>
                        <button onclick="downloadMockExcel()" class="bg-white hover:bg-slate-100 border border-slate-300 text-slate-700 font-bold px-4 py-2 rounded-xl text-xs flex items-center gap-1.5 shadow-sm transition-all">
                            <i class="fa-solid fa-file-excel text-emerald-600"></i> Ekspor Excel
                        </button>
                    </div>
                </div>

                <!-- Filters & Search Bar -->
                <div class="p-6 border-b border-slate-100 grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-2 relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" id="searchInput" oninput="filterRecipientTable()" placeholder="Cari berdasarkan Nama, NIK, atau Kelurahan..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm shadow-sm">
                    </div>
                    <div>
                        <select id="filterBantuan" onchange="filterRecipientTable()" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm shadow-sm bg-white">
                            <option value="all">Semua Jenis Bantuan</option>
                            <option value="PKH">Khusus Bantuan PKH</option>
                            <option value="BPNT">Khusus Bantuan BPNT</option>
                        </select>
                    </div>
                    <div>
                        <select id="filterKecamatan" onchange="filterRecipientTable()" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm shadow-sm bg-white">
                            <option value="all">Semua Kecamatan</option>
                            <option value="Wara">Kecamatan Wara</option>
                            <option value="Bara">Kecamatan Bara</option>
                            <option value="Sendana">Kecamatan Sendana</option>
                            <option value="Telluwanua">Kecamatan Telluwanua</option>
                        </select>
                    </div>
                </div>

                <!-- Recipient Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                <th class="p-4">No</th>
                                <th class="p-4">No. Kartu Keluarga / NIK</th>
                                <th class="p-4">Nama Lengkap KPM</th>
                                <th class="p-4">Wilayah (Kec/Kel)</th>
                                <th class="p-4 text-center">Bantuan</th>
                                <th class="p-4 text-center">Status</th>
                                <th class="p-4 text-center">Lokasi Spasial</th>
                            </tr>
                        </thead>
                        <tbody id="recipientTableBody" class="divide-y divide-slate-100 text-sm">
                            <!-- Dynamic rows via JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer Pagination -->
                <div class="p-4 border-t border-slate-100 bg-slate-50 flex items-center justify-between text-xs text-slate-400 font-medium">
                    <p>Menampilkan <span id="displayedCount">10</span> dari <span id="totalCount">10</span> KPM terdaftar</p>
                    <div class="flex items-center gap-1">
                        <button class="p-2 border border-slate-200 rounded-lg hover:bg-white transition bg-slate-100" disabled><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="px-3 py-1.5 border border-slate-200 rounded-lg bg-emerald-600 text-white shadow-sm font-bold">1</button>
                        <button class="p-2 border border-slate-200 rounded-lg hover:bg-white transition"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- TAB: DATA REKAPITULASI (CHARTS)                -->
        <!-- ============================================== -->
        <section id="tab-data-rekapitulasi" class="tab-section hidden py-12 px-4 md:px-8 max-w-7xl mx-auto">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Analytics Chart (Bar Chart) -->
                <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-md border border-slate-100">
                    <h3 class="text-base font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-chart-simple text-emerald-600"></i> Sebaran Penerima Bantuan Sosial Per Kecamatan (KPM)
                    </h3>
                    <div class="h-80 w-full relative">
                        <canvas id="rekapChart" class="w-full h-full"></canvas>
                    </div>
                </div>

                <!-- Aid Share Ratio (Donut Chart) -->
                <div class="bg-white p-6 rounded-2xl shadow-md border border-slate-100 flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-slate-800 mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-chart-pie text-emerald-600"></i> Rasio Penyaluran PKH vs BPNT
                        </h3>
                        <div class="h-64 w-full relative flex items-center justify-center">
                            <canvas id="ratioChart" class="max-w-[220px] max-h-[220px]"></canvas>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400 text-center italic border-t border-slate-100 pt-3">Data diperbarui otomatis sesuai validasi sinkronisasi pusat Kemensos RI.</p>
                </div>
            </div>

            <!-- Detailed Recapitulation Grid -->
            <div class="bg-white p-6 rounded-2xl shadow-md border border-slate-100 mt-8 overflow-hidden">
                <h3 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-table"></i> Rincian Kuantitatif Bantuan Per Kecamatan Palopo (KPM)
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs md:text-sm">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-slate-400 font-bold uppercase">
                                <th class="p-4">Kecamatan</th>
                                <th class="p-4 text-center">PKH (KPM)</th>
                                <th class="p-4 text-center">BPNT (KPM)</th>
                                <th class="p-4 text-center">Total KPM</th>
                                <th class="p-4 text-right">Persentase Terlayani</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-600 font-medium">
                            <tr>
                                <td class="p-4 text-slate-800 font-bold">Kecamatan Wara</td>
                                <td class="p-4 text-center text-emerald-600 font-bold">1,450</td>
                                <td class="p-4 text-center text-amber-600 font-bold">2,100</td>
                                <td class="p-4 text-center font-extrabold text-slate-700">3,550</td>
                                <td class="p-4 text-right"><span class="bg-emerald-100 text-emerald-800 font-bold px-2 py-1 rounded">100%</span></td>
                            </tr>
                            <tr>
                                <td class="p-4 text-slate-800 font-bold">Kecamatan Bara</td>
                                <td class="p-4 text-center text-emerald-600 font-bold">1,200</td>
                                <td class="p-4 text-center text-amber-600 font-bold">1,850</td>
                                <td class="p-4 text-center font-extrabold text-slate-700">3,050</td>
                                <td class="p-4 text-right"><span class="bg-emerald-100 text-emerald-800 font-bold px-2 py-1 rounded">98.5%</span></td>
                            </tr>
                            <tr>
                                <td class="p-4 text-slate-800 font-bold">Kecamatan Sendana</td>
                                <td class="p-4 text-center text-emerald-600 font-bold">1,100</td>
                                <td class="p-4 text-center text-amber-600 font-bold">1,600</td>
                                <td class="p-4 text-center font-extrabold text-slate-700">2,700</td>
                                <td class="p-4 text-right"><span class="bg-emerald-100 text-emerald-800 font-bold px-2 py-1 rounded">99.1%</span></td>
                            </tr>
                            <tr>
                                <td class="p-4 text-slate-800 font-bold">Kecamatan Telluwanua</td>
                                <td class="p-4 text-center text-emerald-600 font-bold">1,100</td>
                                <td class="p-4 text-center text-amber-600 font-bold">1,660</td>
                                <td class="p-4 text-center font-extrabold text-slate-700">2,760</td>
                                <td class="p-4 text-right"><span class="bg-emerald-100 text-emerald-800 font-bold px-2 py-1 rounded">100%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- ============================================== -->
        <!-- TAB: LAPORAN                                   -->
        <!-- ============================================== -->
        <section id="tab-laporan" class="tab-section hidden py-12 px-4 md:px-8 max-w-4xl mx-auto">
            
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-8">
                <div class="border-b border-slate-100 pb-4 mb-6">
                    <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                        <i class="fa-solid fa-file-signature text-amber-500 animate-pulse"></i> Formulir Pengaduan & Laporan Penerima Bantuan
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">Gunakan formulir resmi ini untuk melaporkan kecurangan, ketidaklayakan penerima bantuan (KPM), atau kesalahan koordinat hunian.</p>
                </div>

                <form id="complaintForm" onsubmit="handleComplaintSubmit(event)" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Pelapor (Lengkap)</label>
                            <input type="text" required placeholder="Contoh: Ahmad Budiman" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm shadow-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">NIK Pelapor</label>
                            <input type="text" required placeholder="Contoh: 7373xxxxxxxxxxxx" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm shadow-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Jenis Masalah / Laporan</label>
                            <select class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm shadow-sm bg-white">
                                <option>Penerima Bantuan Dinilai Tidak Layak (Mampu secara ekonomi)</option>
                                <option>Kesalahan Koordinat Spasial di WebGIS</option>
                                <option>KPM Pindah Domisili ke Luar Palopo</option>
                                <option>Lainnya (Tuliskan rincian di bawah)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Jenis Bantuan Terkait</label>
                            <select class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm shadow-sm bg-white">
                                <option>Bantuan PKH</option>
                                <option>Bantuan BPNT</option>
                                <option>Kedua-duanya (PKH & BPNT)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Rincian Laporan Pengaduan</label>
                        <textarea required rows="4" placeholder="Tuliskan secara lengkap nama warga yang dilaporkan, wilayah kelurahan, serta alasan mendetail mengenai pengaduan Anda..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm shadow-sm"></textarea>
                    </div>

                    <!-- Modern Info Consent Alert -->
                    <div class="bg-amber-50 border border-amber-100 rounded-xl p-4 text-xs text-amber-800 flex gap-3">
                        <i class="fa-solid fa-shield-halved text-amber-600 mt-0.5 text-base"></i>
                        <div>
                            <p class="font-bold">Privasi Dilindungi</p>
                            <p class="mt-0.5 leading-relaxed text-amber-700">Identitas Anda sebagai pelapor dilindungi penuh oleh undang-undang dinas sosial. Dinas Sosial Kota Palopo akan mengecek kebenaran koordinat geospasial serta kondisi riil warga bersangkutan.</p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-6 py-3 rounded-xl shadow-lg shadow-emerald-900/20 flex items-center gap-2 hover:scale-[1.02] transition-all">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Laporan Pengaduan
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </div>

    <!-- ============================================== -->
    <!-- MODALS & NOTIFICATIONS                         -->
    <!-- ============================================== -->
    <!-- ADMIN LOGIN MODAL -->
    <div id="loginModal" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm flex items-center justify-center z-50 opacity-0 invisible transition-all duration-300">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 overflow-hidden transform scale-95 transition-all duration-300" id="loginCard">
            <!-- Modal Header -->
            <div class="bg-brand-800 text-white p-6 relative">
                <button onclick="closeLoginModal()" class="absolute right-4 top-4 text-white/80 hover:text-white hover:scale-110 transition">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center border border-white/20">
                        <i class="fa-solid fa-lock text-lg text-amber-300"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Login Admin / Petugas</h3>
                        <p class="text-[11px] text-emerald-100 mt-0.5">Akses khusus pengelolaan pangkasan data WebGIS Palopo</p>
                    </div>
                </div>
            </div>

            <!-- Modal Form Body -->
            <form id="loginForm" onsubmit="handleLoginSubmit(event)" class="p-6 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Username Admin</label>
                    <input type="text" required placeholder="Contoh: admin_wara" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm shadow-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Kata Sandi (Password)</label>
                    <input type="password" required placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm shadow-sm">
                </div>
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-1.5 text-slate-500 cursor-pointer select-none">
                        <input type="checkbox" class="rounded text-emerald-600 focus:ring-emerald-500"> Ingat Akun
                    </label>
                    <a href="#" class="text-brand-600 hover:underline font-semibold">Lupa Password?</a>
                </div>
                <button type="submit" class="w-full mt-4 bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-emerald-950/20 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-right-to-bracket"></i> Autentikasi Pengguna
                </button>
            </form>
        </div>
    </div>

    <!-- MODERN FLOATING TOAST NOTIFICATION -->
    <div id="toast" class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white py-3 px-5 rounded-2xl shadow-2xl border border-slate-700 flex items-center gap-3 translate-y-20 opacity-0 transition-all duration-300 max-w-sm">
        <div id="toastIcon" class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-check"></i>
        </div>
        <div>
            <p id="toastTitle" class="font-bold text-xs">Pemberitahuan</p>
            <p id="toastMessage" class="text-[11px] text-slate-300 mt-0.5 leading-relaxed">Pemberitahuan pesan berhasil dikirimkan.</p>
        </div>
    </div>

    @include('user.footer')
 

    <!-- JAVASCRIPT LOGIC & INTERACTION ENGINE -->
    <script>
        // Global State & Mock Geolocation Data for Palopo City
        let activeTab = 'beranda';
        let mapInstance = null;
        let mapMarkers = [];
        let rekapChartInstance = null;
        let ratioChartInstance = null;

        // Coordinates Palopo: ~ Lat -2.9904, Lon 120.1915
        const PALOPO_COORDS = [-2.9904, 120.1915];

        // Rich Mock Recipient Data (Coordinates centered on actual subdistricts in Palopo)
        const mockKPM = [
            { id: 1, name: "Sufriadi bin Aris", nik: "7373010405880001", kk: "7373012211150004", aidType: "PKH", subdistrict: "Wara", ward: "Dangerakko", coords: [-2.9865, 120.1950], address: "Jl. Kelapa No. 12", amount: "Rp 750.000 / Tahap", status: "Terbantu" },
            { id: 2, name: "Nurbiah Syarif", nik: "7373021411790003", kk: "7373022411120001", aidType: "BPNT", subdistrict: "Bara", ward: "Bara", coords: [-2.9550, 120.1820], address: "Jl. Trans Sulawesi Km 7", amount: "Rp 200.000 / Bulan", status: "Terbantu" },
            { id: 3, name: "Haris Fadillah", nik: "7373041209820002", kk: "7373040402160005", aidType: "PKH", subdistrict: "Sendana", ward: "Sendana", coords: [-3.0320, 120.1980], address: "Kampung Baru Sendana RT 02", amount: "Rp 1.200.000 / Tahap", status: "Terbantu" },
            { id: 4, name: "Ratna Sari", nik: "7373010312900004", kk: "7373010202150009", aidType: "BPNT", subdistrict: "Wara", ward: "Surutanga", coords: [-2.9950, 120.2030], address: "Gg. Damai No. 44", amount: "Rp 200.000 / Bulan", status: "Terbantu" },
            { id: 5, name: "M. Yusuf Taslim", nik: "7373030205850005", kk: "7373032510100012", aidType: "PKH", subdistrict: "Telluwanua", ward: "Pentojangan", coords: [-2.9150, 120.1650], address: "Dusun To'bia RT 01", amount: "Rp 900.000 / Tahap", status: "Terbantu" },
            { id: 6, name: "Siti Rahma", nik: "7373021506860002", kk: "7373021110130006", aidType: "BPNT", subdistrict: "Bara", ward: "Rampokang", coords: [-2.9610, 120.1740], address: "Jl. Veteran No. 8A", amount: "Rp 200.000 / Bulan", status: "Terbantu" },
            { id: 7, name: "Ferdinandus R.", nik: "7373040807890001", kk: "7373042008140003", aidType: "PKH", subdistrict: "Sendana", ward: "Mangkutana", coords: [-3.0450, 120.1850], address: "Perumahan Pesona Sendana Blok C", amount: "Rp 1.500.000 / Tahap", status: "Terbantu" },
            { id: 8, name: "Khadijah Al-Kubro", nik: "7373010410810008", kk: "7373012912110002", aidType: "BPNT", subdistrict: "Wara", ward: "Boting", coords: [-2.9910, 120.1905], address: "Jl. Andi Djemma No. 102", amount: "Rp 200.000 / Bulan", status: "Terbantu" }
        ];

        // Active Slider Hero Controls
        let currentSlide = 0;
        const totalSlides = 2;

        // Automatic Carousel Slide Timer
        setInterval(() => {
            currentSlide = (currentSlide + 1) % totalSlides;
            setSlide(currentSlide);
        }, 6000);

        function setSlide(index) {
            currentSlide = index;
            const slides = document.querySelectorAll('.slide');
            slides.forEach((slide, i) => {
                slide.style.opacity = i === index ? '1' : '0';
            });
            // Update dot visual
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.getElementById(`dot-${i}`);
                if (dot) {
                    if (i === index) {
                        dot.className = "w-3 h-3 rounded-full bg-emerald-500 transition-all duration-300";
                    } else {
                        dot.className = "w-3 h-3 rounded-full bg-slate-600 hover:bg-emerald-400 transition-all duration-300";
                    }
                }
            }
        }

        // Live Clock Engine
        setInterval(() => {
            const date = new Date();
            const options = { timeZone: 'Asia/Makassar', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
            const timeString = new Intl.DateTimeFormat('id-ID', options).format(date);
            document.getElementById('liveClock').textContent = timeString + " WITA";
        }, 1000);

        // Mobile Nav Toggle Mechanics
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const burgerIcon = document.getElementById('burgerIcon');

        mobileMenuBtn.addEventListener('click', () => {
            toggleMobileMenu();
        });

        function toggleMobileMenu() {
            mobileMenu.classList.toggle('hidden');
            if (mobileMenu.classList.contains('hidden')) {
                burgerIcon.className = "fa-solid fa-bars text-xl";
            } else {
                burgerIcon.className = "fa-solid fa-xmark text-xl";
            }
        }

        // Single Page Navigation Engine
        function switchTab(tabId) {
            activeTab = tabId;

            // Hide all tab sections
            document.querySelectorAll('.tab-section').forEach(sec => {
                sec.classList.add('hidden');
            });

            // Remove active classes from desktop buttons
            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.className = "nav-btn px-3 py-2 rounded-lg text-sm font-semibold text-emerald-100 hover:bg-brand-800 hover:text-white transition-all duration-300 flex items-center gap-1.5";
            });

            // Map standard tabs to appropriate sections
            let targetSectionId = `tab-${tabId}`;
            if (tabId === 'peta-kemiskinan' || tabId === 'peta-pkh' || tabId === 'peta-bpnt') {
                targetSectionId = 'tab-map-viewer';
                const mapBtn = document.getElementById('nav-peta-kemiskinan');
                if (mapBtn) mapBtn.className = "nav-btn px-3 py-2 rounded-lg text-sm font-semibold transition-all duration-300 bg-brand-800 text-white flex items-center gap-1.5";
            } else {
                const navBtn = document.getElementById(`nav-${tabId}`);
                if (navBtn) navBtn.className = "nav-btn px-3 py-2 rounded-lg text-sm font-semibold transition-all duration-300 bg-brand-800 text-white flex items-center gap-1.5";
            }

            // Show active tab
            const activeSec = document.getElementById(targetSectionId);
            if (activeSec) {
                activeSec.classList.remove('hidden');
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Lazy Initialization of GIS Map & Charts
            if (targetSectionId === 'tab-map-viewer') {
                initGisMap(tabId);
            } else if (tabId === 'data-rekapitulasi') {
                initCharts();
            }

            // Reset Search Table Filters
            if (tabId === 'data-penerima') {
                renderRecipientTable(mockKPM);
            }
        }

        // MODAL LOGIC (ADMIN LOGIN)
        function openLoginModal() {
            const modal = document.getElementById('loginModal');
            const card = document.getElementById('loginCard');
            modal.classList.remove('invisible', 'opacity-0');
            card.classList.remove('scale-95');
            card.classList.add('scale-100');
        }

        function closeLoginModal() {
            const modal = document.getElementById('loginModal');
            const card = document.getElementById('loginCard');
            modal.classList.add('opacity-0', 'invisible');
            card.classList.remove('scale-100');
            card.classList.add('scale-95');
        }

        function showNotification(title, message, isSuccess = true) {
            const toast = document.getElementById('toast');
            const toastTitle = document.getElementById('toastTitle');
            const toastMessage = document.getElementById('toastMessage');
            const toastIcon = document.getElementById('toastIcon');

            toastTitle.textContent = title;
            toastMessage.textContent = message;

            if (isSuccess) {
                toastIcon.className = "w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0";
                toastIcon.innerHTML = `<i class="fa-solid fa-circle-check"></i>`;
            } else {
                toastIcon.className = "w-8 h-8 rounded-full bg-rose-500/20 text-rose-400 flex items-center justify-center flex-shrink-0";
                toastIcon.innerHTML = `<i class="fa-solid fa-triangle-exclamation"></i>`;
            }

            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
                toast.classList.remove('translate-y-0', 'opacity-100');
            }, 4000);
        }

        // Submit Form Handlers (No alert, beautiful response design)
        function handleComplaintSubmit(event) {
            event.preventDefault();
            showNotification(
                "Laporan Terkirim!", 
                "Terima kasih atas laporan Anda. Dinas Sosial Kota Palopo segera melakukan verifikasi lapangan.",
                true
            );
            event.target.reset();
        }

        function handleLoginSubmit(event) {
            event.preventDefault();
            showNotification(
                "Akses Ditolak", 
                "Maaf, otentikasi administrator gagal. Silakan verifikasi sandi Anda ke Admin Pemda Palopo.",
                false
            );
            closeLoginModal();
        }

        // WebGIS Core Maps Mechanics
        function initGisMap(tabId) {
            // Wait for DOM layout and avoid double-instantiation of Leaflet map
            setTimeout(() => {
                if (mapInstance !== null) {
                    mapInstance.remove();
                    mapInstance = null;
                }

                // Create the Leaflet map instance
                mapInstance = L.map('gisMap', {
                    center: PALOPO_COORDS,
                    zoom: 12,
                    zoomControl: false
                });

                // Set premium tile layer from CartoDB Voyager Light Theme
                L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions">CartoDB</a>',
                    subdomains: 'abcd',
                    maxZoom: 20
                }).addTo(mapInstance);

                // Add premium compact scale and controls
                L.control.zoom({ position: 'topright' }).addTo(mapInstance);

                // Dynamically update subtitles based on tab triggers
                const titleNode = document.getElementById('map-title');
                const subtitleNode = document.getElementById('map-subtitle');

                if (tabId === 'peta-pkh') {
                    titleNode.innerHTML = `<i class="fa-solid fa-hands-holding text-emerald-400"></i> Peta Sebaran Bantuan Sosial PKH Palopo`;
                    subtitleNode.textContent = "Memetakan klaster penerima KPM PKH di 9 Kecamatan secara spesifik.";
                } else if (tabId === 'peta-bpnt') {
                    titleNode.innerHTML = `<i class="fa-solid fa-cart-shopping text-amber-400"></i> Peta Sebaran Bantuan Sosial BPNT Palopo`;
                    subtitleNode.textContent = "Menyajikan persebaran lokasi penyaluran komoditas pangan non-tunai.";
                } else {
                    titleNode.innerHTML = `<i class="fa-solid fa-map-location-dot text-amber-300"></i> Peta Kemiskinan Terpadu Palopo`;
                    subtitleNode.textContent = "Data spasial indikatif sebaran penduduk prasejahtera DTKS Kota Palopo.";
                }

                // Render geo-markers
                renderMapMarkers(tabId);
            }, 100);
        }

        function renderMapMarkers(filterType) {
            // Clear current map markers
            mapMarkers.forEach(m => mapInstance.removeLayer(m));
            mapMarkers = [];

            // Filter raw database according to aid type active
            let subset = mockKPM;
            if (filterType === 'peta-pkh' || filterType === 'pkh') {
                subset = mockKPM.filter(k => k.aidType === 'PKH');
            } else if (filterType === 'peta-bpnt' || filterType === 'bpnt') {
                subset = mockKPM.filter(k => k.aidType === 'BPNT');
            }

            // Loop and draw markers
            subset.forEach(kpm => {
                // Color schemes based on aid types
                const markerColor = kpm.aidType === 'PKH' ? '#059669' : '#d97706';
                
                // SVG Marker icon
                const customIcon = L.divIcon({
                    className: 'custom-div-icon',
                    html: `<div style="background-color: ${markerColor};" class="w-4 h-4 rounded-full border-2 border-white shadow-lg pulse-marker"></div>`,
                    iconSize: [16, 16],
                    iconAnchor: [8, 8]
                });

                const m = L.marker(kpm.coords, { icon: customIcon }).addTo(mapInstance);

                // Popup dynamic layout
                const popupContent = `
                    <div class="p-3 text-xs space-y-1.5" style="min-width: 180px;">
                        <h4 class="font-extrabold text-slate-800 text-sm border-b border-slate-100 pb-1 flex items-center gap-1.5">
                            <i class="fa-solid fa-user-circle"></i> ${kpm.name}
                        </h4>
                        <p class="font-medium text-slate-500"><strong>Kecamatan:</strong> ${kpm.subdistrict}</p>
                        <p class="font-medium text-slate-500"><strong>Jenis Bantuan:</strong> <span class="bg-slate-100 px-1.5 py-0.5 rounded text-[10px] font-bold text-slate-700">${kpm.aidType}</span></p>
                        <p class="font-bold text-slate-700"><strong>Kondisi:</strong> <span class="text-emerald-600">Layak Menerima</span></p>
                    </div>
                `;

                m.bindPopup(popupContent);

                // Add mouse interaction triggers to fill sidebar info
                m.on('click', () => {
                    const infoSidebar = document.getElementById('map-selected-info');
                    infoSidebar.innerHTML = `
                        <div class="space-y-3">
                            <div>
                                <h4 class="text-xs font-bold text-slate-400">Nama Penerima Manfaat</h4>
                                <p class="text-sm font-extrabold text-slate-800">${kpm.name}</p>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <h4 class="text-[10px] font-bold text-slate-400">NIK Kepala Keluarga</h4>
                                    <p class="text-xs font-bold text-slate-700">${kpm.nik}</p>
                                </div>
                                <div>
                                    <h4 class="text-[10px] font-bold text-slate-400">No. Kartu Keluarga</h4>
                                    <p class="text-xs font-bold text-slate-700">${kpm.kk}</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <h4 class="text-[10px] font-bold text-slate-400">Kecamatan</h4>
                                    <p class="text-xs font-semibold text-slate-700">${kpm.subdistrict}</p>
                                </div>
                                <div>
                                    <h4 class="text-[10px] font-bold text-slate-400">Kelurahan</h4>
                                    <p class="text-xs font-semibold text-slate-700">${kpm.ward}</p>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-[10px] font-bold text-slate-400">Alamat Lengkap</h4>
                                <p class="text-xs text-slate-600 leading-relaxed">${kpm.address}</p>
                            </div>
                            <div class="p-3 bg-emerald-50 rounded-xl border border-emerald-100 flex items-center justify-between">
                                <span class="text-[10px] font-bold text-emerald-800 uppercase">Jenis Bantuan</span>
                                <span class="bg-emerald-600 text-white font-bold text-[10px] px-2.5 py-0.5 rounded-full">${kpm.aidType}</span>
                            </div>
                        </div>
                    `;
                });

                mapMarkers.push(m);
            });
        }

        function filterMapMarkers(type) {
            renderMapMarkers(type);
        }

        function resetMapView() {
            if (mapInstance) {
                mapInstance.setView(PALOPO_COORDS, 12);
                document.getElementById('map-selected-info').innerHTML = `
                    <p class="text-xs text-slate-400 italic">Silakan klik salah satu marker titik hunian di dalam peta untuk memuat informasi KPM terpilih.</p>
                `;
            }
        }

        function zoomToSubdistrict(sub) {
            if (!mapInstance) return;
            const coords = {
                'wara': [-2.9865, 120.1950],
                'bara': [-2.9550, 120.1820],
                'sendana': [-3.0320, 120.1980],
                'wara-timur': [-2.9950, 120.2030]
            };
            if (coords[sub]) {
                mapInstance.setView(coords[sub], 14);
            }
        }

        // Searchable and filterable recipient table logic
        function renderRecipientTable(dataList) {
            const tbody = document.getElementById('recipientTableBody');
            tbody.innerHTML = '';

            if (dataList.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="p-8 text-center text-slate-400 italic font-medium">
                            Data penerima manfaat tidak ditemukan. Silakan gunakan filter atau pencarian lainnya.
                        </td>
                    </tr>
                `;
                document.getElementById('displayedCount').textContent = '0';
                document.getElementById('totalCount').textContent = mockKPM.length.toString();
                return;
            }

            dataList.forEach((k, idx) => {
                const tr = document.createElement('tr');
                tr.className = "hover:bg-slate-50/75 transition-all duration-150 cursor-pointer";
                
                // Clicking table row loads map coordinate automatically on WebGIS tab
                tr.onclick = () => {
                    switchTab('peta-kemiskinan');
                    setTimeout(() => {
                        if (mapInstance) {
                            mapInstance.setView(k.coords, 15);
                            // Find and open marker popup matching coordinate
                            mapMarkers.forEach(m => {
                                const latLng = m.getLatLng();
                                if (latLng.lat === k.coords[0] && latLng.lng === k.coords[1]) {
                                    m.openPopup();
                                    m.fire('click');
                                }
                            });
                        }
                    }, 200);
                };

                tr.innerHTML = `
                    <td class="p-4 font-bold text-slate-500">${idx + 1}</td>
                    <td class="p-4">
                        <p class="font-bold text-slate-800 text-xs">${k.nik}</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">KK: ${k.kk}</p>
                    </td>
                    <td class="p-4 font-semibold text-slate-700">${k.name}</td>
                    <td class="p-4">
                        <p class="font-bold text-slate-800 text-xs">${k.subdistrict}</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Kel. ${k.ward}</p>
                    </td>
                    <td class="p-4 text-center">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold ${k.aidType === 'PKH' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800'}">
                            ${k.aidType}
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <span class="text-xs font-bold text-emerald-600 flex items-center justify-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> ${k.status}
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <button class="bg-slate-100 hover:bg-emerald-600 hover:text-white text-slate-600 font-bold p-2 rounded-lg text-xs transition shadow-sm">
                            <i class="fa-solid fa-map-location-dot"></i> Lihat
                        </button>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            document.getElementById('displayedCount').textContent = dataList.length.toString();
            document.getElementById('totalCount').textContent = mockKPM.length.toString();
        }

        function filterRecipientTable() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const aid = document.getElementById('filterBantuan').value;
            const sub = document.getElementById('filterKecamatan').value;

            const filtered = mockKPM.filter(item => {
                const matchQuery = item.name.toLowerCase().includes(query) || 
                                   item.nik.includes(query) || 
                                   item.ward.toLowerCase().includes(query);
                
                const matchAid = aid === 'all' || item.aidType === aid;
                const matchSub = sub === 'all' || item.subdistrict === sub;

                return matchQuery && matchAid && matchSub;
            });

            renderRecipientTable(filtered);
        }

        // Export Mock Methods
        function downloadMockPDF() {
            showNotification("Mengekspor PDF...", "Berhasil mengunduh salinan ringkasan PDF KPM Palopo.");
        }

        function downloadMockExcel() {
            showNotification("Mengekspor Excel...", "Data spreadsheet excel berhasil disiapkan dan diunduh.");
        }

        // Interactive Analytics Data Charts
        function initCharts() {
            setTimeout(() => {
                // Sebaran Bantuan Bar Chart
                const rekapCtx = document.getElementById('rekapChart').getContext('2d');
                if (rekapChartInstance !== null) {
                    rekapChartInstance.destroy();
                }

                rekapChartInstance = new Chart(rekapCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Wara', 'Bara', 'Sendana', 'Telluwanua', 'Wara Selatan', 'Wara Barat'],
                        datasets: [
                            {
                                label: 'Bantuan PKH (KPM)',
                                data: [1450, 1200, 1100, 1100, 850, 740],
                                backgroundColor: '#059669', // Emerald Green
                                borderRadius: 8
                            },
                            {
                                label: 'Bantuan BPNT (KPM)',
                                data: [2100, 1850, 1600, 1660, 1200, 910],
                                backgroundColor: '#f59e0b', // Amber
                                borderRadius: 8
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: { font: { weight: 'bold', family: 'Inter' } }
                            }
                        },
                        scales: {
                            x: { grid: { display: false } },
                            y: { grid: { color: '#f1f5f9' } }
                        }
                    }
                });

                // Rasio Bantuan Donut Chart
                const ratioCtx = document.getElementById('ratioChart').getContext('2d');
                if (ratioChartInstance !== null) {
                    ratioChartInstance.destroy();
                }

                ratioChartInstance = new Chart(ratioCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['KPM PKH', 'KPM BPNT'],
                        datasets: [{
                            data: [4850, 7210],
                            backgroundColor: ['#059669', '#f59e0b'],
                            borderWidth: 0,
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: { font: { weight: 'bold', family: 'Inter' } }
                            }
                        }
                    }
                });

            }, 100);
        }

        // Initialize counters (Animated Stats)
        function initCounters() {
            const counters = document.querySelectorAll('.count-up');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = Math.ceil(target / 80);
                
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString('id-ID');
                        clearInterval(timer);
                    } else {
                        counter.textContent = current.toLocaleString('id-ID');
                    }
                }, 15);
            });
        }

        // App Initializer
        window.onload = function() {
            initCounters();
            renderRecipientTable(mockKPM);
        }
    </script>
</body>
</html>