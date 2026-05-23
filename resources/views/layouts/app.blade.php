<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <style>
        header{
    position: relative;
    z-index: 9999;
        }

        nav{
            position: sticky;
            top: 0;
            z-index: 9999;
        }

        .leaflet-container{
            z-index: 1 !important;
        }

        .leaflet-top,
        .leaflet-bottom,
        .leaflet-pane{
            z-index: 1 !important;
        }
    </style>

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

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

    @stack('styles')
</head>

<body class="text-slate-800 flex flex-col min-h-screen bg-slate-50">

    @include('user.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('user.footer')

    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>

    <!-- JAVASCRIPT LOGIC & INTERACTION ENGINE -->
    <script>
        // Global State & Mock Geolocation Data for Palopo City
        let activeTab = 'beranda';
        let mapInstance = null;
        let mapMarkers = [];
        let rekapChartInstance = null;
        let ratioChartInstance = null;
        let geojsonLayer = null;

        // Coordinates Palopo: ~ Lat -2.9904, Lon 120.1915
        const PALOPO_COORDS = [-2.9800, 120.1000];


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


        function resetMapView() {
            if (mapInstance) {
                mapInstance.setView(PALOPO_COORDS, 12);
  
            }
        }

   




    

        // Export Mock Methods
        function downloadMockPDF() {
            showNotification("Mengekspor PDF...", "Berhasil mengunduh salinan ringkasan PDF KPM Palopo.");
        }

        function downloadMockExcel() {
            showNotification("Mengekspor Excel...", "Data spreadsheet excel berhasil disiapkan dan diunduh.");
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
            // renderRecipientTable(mockKPM);
            initGisMap();
        }
    </script>

 
    @stack('scripts')

</body>
</html>