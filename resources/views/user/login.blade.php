<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WebGIS PKH & BPNT Kota Palopo</title>


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

<body class="text-slate-800 flex flex-col min-h-screen bg-slate-50">

<section class="min-h-screen bg-slate-100 flex items-center justify-center px-4 py-10">

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-5xl w-full grid grid-cols-1 lg:grid-cols-2">

        <!-- LEFT SIDE -->
        <div class="bg-brand-800 text-white p-10 flex flex-col justify-center relative overflow-hidden">

            <!-- Decorative -->
            <div class="absolute -top-10 -right-10 w-52 h-52 bg-emerald-400/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-56 h-56 bg-amber-300/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <!-- Logo -->
                <div class="w-24 h-24 bg-white/10 rounded-3xl flex items-center justify-center border border-white/20 shadow-xl mb-8">
                    <i class="fa-solid fa-map-location-dot text-5xl text-amber-300"></i>
                </div>

                <!-- Title -->
                <h1 class="text-3xl lg:text-4xl font-extrabold leading-tight">
                    GIS PKH & BPNT
                </h1>

                <p class="text-emerald-100 mt-4 text-sm leading-relaxed max-w-md">
                    Sistem Informasi Geografis Penerima Bantuan 
                    Program Keluarga Harapan (PKH) dan Bantuan Pangan Non Tunai (BPNT) Kota Palopo.
                </p>

                <!-- Features -->
                <div class="mt-10 space-y-4">

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center">
                            <i class="fa-solid fa-map text-emerald-300"></i>
                        </div>

                        <div>
                            <h4 class="font-bold text-sm">Pemetaan Spasial</h4>
                            <p class="text-xs text-emerald-100">
                                Visualisasi titik penerima bantuan berbasis GIS
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center">
                            <i class="fa-solid fa-users text-emerald-300"></i>
                        </div>

                        <div>
                            <h4 class="font-bold text-sm">Manajemen Data KPM</h4>
                            <p class="text-xs text-emerald-100">
                                Pengelolaan data penerima bantuan terintegrasi
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center">
                            <i class="fa-solid fa-shield-halved text-emerald-300"></i>
                        </div>

                        <div>
                            <h4 class="font-bold text-sm">Keamanan Sistem</h4>
                            <p class="text-xs text-emerald-100">
                                Akses admin dilindungi autentikasi aman
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="p-8 lg:p-12 flex flex-col justify-center">

            <!-- Heading -->
            <div class="mb-8">

                <span class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 text-xs font-bold px-4 py-2 rounded-full border border-emerald-100">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Sistem Aktif & Online
                </span>

                <h2 class="text-3xl font-extrabold text-slate-800 mt-5">
                    Selamat Datang
                </h2>

                <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                    Silakan login menggunakan akun administrator untuk mengakses dashboard WebGIS PKH & BPNT Kota Palopo.
                </p>

            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf

                <!-- Username -->
                <div>

                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">
                        Username
                    </label>

                    <div class="relative">

                        <input 
                            type="text"
                            name="username"
                            placeholder="Masukkan username admin"
                            required
                            autocomplete="off"
                            class="w-full pl-12 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent shadow-sm text-sm">

                        <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                    </div>

                </div>

                <!-- Password -->
<!-- Password -->
<div>

    <div class="flex items-center justify-between mb-2">

        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">
            Password
        </label>

    </div>

    <div class="relative">

        <!-- Input Password -->
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            required
            class="w-full pl-12 pr-12 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent shadow-sm text-sm">

        <!-- Icon Lock -->
        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

        <!-- Tombol Lihat Password -->
        <button 
            type="button"
            onclick="togglePassword()"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition">

            <i id="eyeIcon" class="fa-solid fa-eye"></i>

        </button>

    </div>

</div>



                <!-- Remember -->
                <!-- <div class="flex items-center justify-between text-sm">

                    <label class="flex items-center gap-2 text-slate-500">
                        <input type="checkbox" class="rounded text-emerald-600">
                        Ingat akun saya
                    </label>

                    <span class="text-emerald-600 font-semibold text-xs">
                        Kota Palopo
                    </span>

                </div> -->

                <!-- Button -->
                <button 
                    type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3.5 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-emerald-500/20 hover:-translate-y-0.5">

                    <i class="fa-solid fa-right-to-bracket mr-2"></i>
                    Masuk ke Dashboard

                </button>

            </form>

            <!-- Footer -->
            <div class="mt-8 text-center">

                <a href="/"
                    class="text-sm text-slate-500 hover:text-emerald-600 transition font-medium">

                    <i class="fa-solid fa-arrow-left mr-2"></i>
                    Kembali ke Beranda

                </a>

            </div>

        </div>

    </div>

</section>

<!-- SCRIPT -->
<script>
    function togglePassword() {

        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {

            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');

        } else {

            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');

        }
    }
</script>