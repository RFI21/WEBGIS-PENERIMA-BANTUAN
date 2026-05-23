@extends('layouts.app')

@section('title', 'WebGIS PKH & BPNT Kota Palopo')

@section('content')
 
 
       <!-- ============================================== -->
        <!-- TAB: PETA KEMISKINAN / PENERIMA (GIS VIEW)     -->
        <!-- ============================================== -->
        <section  class="tab-section  py-6 px-4 md:px-8 max-w-7xl mx-auto">
            
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

                </div>

                <div class="flex flex-col lg:flex-row">
                    <!-- Leaflet Container -->
                    <div class="w-full lg:w-3/4 h-[90vh] relative">
                        <div id="gisMap" class="w-full h-full bg-slate-100"></div>
                        <!-- Absolute Legend Floating inside Map -->
                        <div class="absolute bottom-4 left-4 z-[1000] bg-white/95 backdrop-blur-md p-4 rounded-xl shadow-lg text-xs border border-slate-200 space-y-2 max-w-xs">

                            <h4 class="font-bold text-slate-800 border-b border-slate-100 pb-1 mb-2 flex items-center gap-1.5">
                                <i class="fa-solid fa-map"></i> Legenda Kecamatan
                            </h4>

                            <div class="grid grid-cols-2 gap-x-4 gap-y-2">

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#ff0000] border border-white shadow"></span>
                                    <span class="text-slate-600">Wara</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#00ff00] border border-white shadow"></span>
                                    <span class="text-slate-600">Wara Selatan</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#fffb04] border border-white shadow"></span>
                                    <span class="text-slate-600">Wara Barat</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#ff0088] border border-white shadow"></span>
                                    <span class="text-slate-600">Wara Timur</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#0000ff] border border-white shadow"></span>
                                    <span class="text-slate-600">Wara Utara</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#ff9900] border border-white shadow"></span>
                                    <span class="text-slate-600">Sendana</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#2f2f2f] border border-white shadow"></span>
                                    <span class="text-slate-600">Telluwanua</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#02ffff] border border-white shadow"></span>
                                    <span class="text-slate-600">Mungkajang</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="w-4 h-4 rounded bg-[#ff66ff] border border-white shadow"></span>
                                    <span class="text-slate-600">Bara</span>
                                </div>

                            </div>


                            <p class="text-[9px] text-slate-400 italic pt-2 border-t border-slate-100">
                                Klik polygon kecamatan atau marker bantuan untuk melihat detail data sosial.
                            </p>

                        </div>
                    </div>

                    <!-- Map Sidebar Info Panels -->
                    <div class="w-full lg:w-1/4 h-[90vh] bg-slate-50 border-t lg:border-t-0 lg:border-l border-slate-200 p-6 flex flex-col justify-between overflow-y-auto">
                        <div class="space-y-6">
                           
                            <div class="space-y-3">
                                <h3 class="font-bold text-sm text-slate-700 uppercase tracking-wider">PILIH Kecamatan
                                </h3>
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('wara')">
                                        Wara
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('wara-timur')">
                                        Wara Timur
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('wara-barat')">
                                        Wara Barat
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('wara-utara')">
                                        Wara Utara
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('wara-selatan')">
                                        Wara Selatan
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('bara')">
                                        Bara
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('mungkajang')">
                                        Mungkajang
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('sendana')">
                                        Sendana
                                    </span>

                                    <span class="bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                                        onclick="zoomToSubdistrict('telluwanua')">
                                        Telluwanua
                                    </span>
                                </div>
                            </div>


                             <div>
                                <div id="map-selected-info" class="p-4 bg-white rounded-xl border border-slate-200 space-y-3 shadow-sm">

                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wide border-b border-slate-100 pb-2">
                                        Klasifikasi Desil Kemiskinan
                                    </h4>

                                    <!-- DESIL 1 -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="w-4 h-4 rounded-full bg-red-600 shadow"></span>
                                            <span class="text-xs text-slate-700 font-medium">
                                                Desil 1
                                            </span>
                                        </div>

                                        <span class="text-[10px] text-red-700 font-bold bg-red-100 px-2 py-1 rounded-full">
                                            Sangat Miskin
                                        </span>
                                    </div>

                                    <!-- DESIL 2 -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="w-4 h-4 rounded-full bg-orange-500 shadow"></span>
                                            <span class="text-xs text-slate-700 font-medium">
                                                Desil 2
                                            </span>
                                        </div>

                                        <span class="text-[10px] text-orange-700 font-bold bg-orange-100 px-2 py-1 rounded-full">
                                            Miskin
                                        </span>
                                    </div>

                                    <!-- DESIL 3 -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="w-4 h-4 rounded-full bg-amber-400 shadow"></span>
                                            <span class="text-xs text-slate-700 font-medium">
                                                Desil 3
                                            </span>
                                        </div>

                                        <span class="text-[10px] text-amber-700 font-bold bg-amber-100 px-2 py-1 rounded-full">
                                            Rentan Miskin
                                        </span>
                                    </div>

                                    <!-- DESIL 4 -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="w-4 h-4 rounded-full bg-yellow-300 shadow"></span>
                                            <span class="text-xs text-slate-700 font-medium">
                                                Desil 4
                                            </span>
                                        </div>

                                        <span class="text-[10px] text-yellow-700 font-bold bg-yellow-100 px-2 py-1 rounded-full">
                                            Hampir Miskin
                                        </span>
                                    </div>

                                    <!-- DESIL 5 -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="w-4 h-4 rounded-full bg-lime-500 shadow"></span>
                                            <span class="text-xs text-slate-700 font-medium">
                                                Desil 5
                                            </span>
                                        </div>

                                            <span class="text-[10px] text-lime-700 font-bold bg-lime-100 px-2 py-1 rounded-full">
                                                Menengah Bawah
                                            </span>
                                        </div>

                                            <!-- DESIL 6-10 -->
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-2">
                                                    <span class="w-4 h-4 rounded-full bg-emerald-500 shadow"></span>
                                                    <span class="text-xs text-slate-700 font-medium">
                                                        Desil 6 - 10
                                                    </span>
                                                </div>

                                                <span class="text-[10px] text-emerald-700 font-bold bg-emerald-100 px-2 py-1 rounded-full">
                                                    Menengah Atas
                                                </span>
                                            </div>

                                    <div class="pt-2 border-t border-slate-100">
                                        <p class="text-[10px] text-slate-400 italic leading-relaxed">
                                            Informasi desil digunakan untuk klasifikasi tingkat kesejahteraan masyarakat berdasarkan data sosial ekonomi.
                                        </p>
                                    </div>

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
@endsection
<script>
    // WebGIS Core Maps Mechanics
function initGisMap(filterType = 'all') {

    setTimeout(() => {

        const mapContainer = document.getElementById('gisMap');

        if (!mapContainer) {
            console.log('Container gisMap tidak ditemukan');
            return;
        }

        // Hapus map lama
        if (mapInstance !== null) {
            mapInstance.remove();
            mapInstance = null;
        }

        // Buat map
        mapInstance = L.map('gisMap', {
            zoomControl: false
        });

        // Posisi awal map
        mapInstance.setView(PALOPO_COORDS, 12);

        // Basemap
        L.tileLayer(
            'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png',
            {
                attribution: '&copy; OpenStreetMap &copy; CartoDB',
                subdomains: 'abcd',
                maxZoom: 20
            }
        ).addTo(mapInstance);

        // Zoom control
        L.control.zoom({
            position: 'topright'
        }).addTo(mapInstance);

        // Warna kecamatan
        const kecamatanColors = {
            "Wara": "#ff0000",
            "Wara Selatan": "#00ff00",
            "Wara Barat": "#fffb04",
            "Wara Timur": "#ff0088",
            "Wara Utara": "#0000ff",
            "Sendana": "#ff9900",
            "Telluwanua": "#2f2f2f",
            "Mungkajang": "#02ffff",
            "Bara": "#ff66ff"
        };

        // var geojsonLayer;

        // Load GeoJSON
        fetch("{{ asset('assets/js/kecamatan.geojson') }}")
            .then(response => response.json())
            .then(data => {

                geojsonLayer = L.geoJSON(data, {

                    style: function(feature) {

                        const kec = feature.properties.nm_kecamatan?.trim();

                        return {
                            color: '#ffffff',
                            weight: 2,
                            fillColor: kecamatanColors[kec] || '#cbd5e1',
                            fillOpacity: 0.5
                        };
                    },

                    onEachFeature: function(feature, layer) {

                        const namaKec = feature.properties.nm_kecamatan;



                    const kecamatanData = @json($kemiskinans);


                    layer.bindPopup(`
                        <div class="text-sm">
                            <h3 class="font-bold text-emerald-700 mb-2">
                                Kecamatan ${namaKec}
                            </h3>

                            <div class="space-y-1 text-xs text-slate-600">

                                ${kecamatanData
                                    .filter(k => k.nama_kecamatan === namaKec)
                                    .map(k => `
                                        <div class="flex justify-between gap-3">
                                            <span class="font-semibold">Desil ${k.desil}</span>
                                            <span>${k.jumlah_keluarga} Keluarga (${k.jumlah_jiwa} Jiwa)</span>
                                        </div>
                                    `).join('')}

                            </div>

                            <div class="mt-3 pt-2 border-t border-slate-200">
                                <p class="text-[11px] text-slate-500">
                                    Wilayah administrasi Kota Palopo
                                </p>
                            </div>
                        </div>
                    `);

                        // Hover
                        layer.on('mouseover', function() {

                            this.setStyle({
                                fillOpacity: 0.8,
                                weight: 3
                            });

                        });

                        layer.on('mouseout', function() {

                            geojsonLayer.resetStyle(this);

                        });

                    }

                }).addTo(mapInstance);

                // Fit bounds
                // mapInstance.fitBounds(geojsonLayer.getBounds());

                // Render marker bantuan
                renderMapMarkers(filterType);

            })
            .catch(error => {
                console.log('Gagal load GeoJSON:', error);
            });

    }, 100);

}

</script>