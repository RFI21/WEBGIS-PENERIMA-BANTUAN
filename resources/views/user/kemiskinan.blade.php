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
      
                    </div>

                    <!-- Map Sidebar Info Panels -->
                    <div class="w-full lg:w-1/4 h-[90vh] bg-slate-50 border-t lg:border-t-0 lg:border-l border-slate-200 p-6 flex flex-col justify-between overflow-y-auto">
                        <div class="space-y-6">
                           
                            <div class="space-y-3">
                                <h3 class="font-bold text-sm text-slate-700 uppercase tracking-wider">PILIH Kecamatan
                                </h3>
                                <select id="kecamatanSelect"
                                        class="w-full p-2 border rounded-lg"
                                        onchange="loadKelurahan()">

                                    <option value="">-- Pilih Kecamatan --</option>
                                    <option value="Wara">Wara</option>
                                    <option value="Wara Timur">Wara Timur</option>
                                    <option value="Wara Barat">Wara Barat</option>
                                    <option value="Wara Utara">Wara Utara</option>
                                    <option value="Wara Selatan">Wara Selatan</option>
                                    <option value="Bara">Bara</option>
                                    <option value="Mungkajang">Mungkajang</option>
                                    <option value="Sendana">Sendana</option>
                                    <option value="Telluwanua">Telluwanua</option>
                                </select>
                            </div>


                            <div class="space-y-3 mt-4">

                                <h3 class="font-bold text-sm text-slate-700 uppercase tracking-wider">
                                    Kelurahan
                                </h3>

                                <div id="kelurahanContainer"
                                    class="grid grid-cols-2 gap-2 text-xs">
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


        // var geojsonLayer;

        // Load GeoJSON
        fetch("{{ asset('assets/js/Batas_Wilayah_KelurahanDesa_.json') }}")
            .then(response => response.json())
            .then(data => {

            const warna = [
                '#ef4444', '#f97316', '#f59e0b', '#eab308',
                '#84cc16', '#22c55e', '#10b981', '#14b8a6',
                '#06b6d4', '#0ea5e9', '#3b82f6', '#6366f1',
                '#8b5cf6', '#a855f7', '#d946ef', '#ec4899',
                '#f43f5e', '#dc2626', '#ea580c', '#ca8a04',
                '#65a30d', '#16a34a', '#059669', '#0f766e',
                '#0891b2', '#0284c7', '#2563eb', '#4f46e5',
                '#7c3aed', '#9333ea', '#c026d3', '#db2777',
                '#be123c', '#b91c1c', '#c2410c', '#a16207',
                '#4d7c0f', '#15803d', '#047857', '#115e59',
                '#155e75', '#0369a1', '#1d4ed8', '#4338ca',
                '#6d28d9', '#7e22ce', '#a21caf', '#be185d'
            ];

            const kelurahanColorMap = {};

            let index = 0;

            data.features.forEach(feature => {

                const namaKel = feature.properties.WADMKD?.trim();

                if (!kelurahanColorMap[namaKel]) {
                    kelurahanColorMap[namaKel] = warna[index % warna.length];
                    index++;
                }

            });


                geojsonLayer = L.geoJSON(data, {

                    style: function(feature) {

                        const kelurahan = feature.properties.WADMKD?.trim();

                        return {
                            color: '#ffffff',
                            weight: 2,
                            fillColor: kelurahanColorMap[kelurahan] || '#cbd5e1',
                            fillOpacity: 0.6
                        };
                    },

                    onEachFeature: function(feature, layer) {

                        // const namaKec = feature.properties.nm_kecamatan;
                    const namaKel =
                        feature.properties.WADMKD;

                    const namaKec =
                        feature.properties.WADMKC;


                    const kelurahanData = @json($kemiskinans);


                    layer.bindPopup(`
                        <div class="text-sm">
                            <h3 class="font-bold text-emerald-700">
                                Kelurahan ${namaKel}
                            </h3>
                            <h1 class="text-gray-700 mb-3 ">
                                (Kecamatan ${namaKec})
                            </h1>

                            <div class="space-y-1 text-xs text-slate-600">

                                ${kelurahanData
                                    .filter(k => k.kelurahan === namaKel)
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

                        layer.on('click', function () {
                                layer.openPopup(); // pastikan popup tetap tampil
                                setActiveKelurahan(namaKel);
                                selectKelurahanByName(namaKel);
                            });

                    }

                }).addTo(mapInstance);

                // Fit bounds
                // mapInstance.fitBounds(geojsonLayer.getBounds());


            })
            .catch(error => {
                console.log('Gagal load GeoJSON:', error);
            });

    }, 100);

}

</script>

<script>
 function selectKecamatanByName(namaKec) {

    // cari data geojson
    fetch("{{ asset('assets/js/kecamatan.geojson') }}")
        .then(res => res.json())
        .then(data => {

            const feature = data.features.find(f =>
                f.properties.nm_kecamatan.toLowerCase().trim() === namaKec.toLowerCase()
            );

            const nama = feature ? feature.properties.nm_kecamatan : namaKec;

    

            // 2. highlight sidebar
            setActiveKecamatan(nama);

            // 3. buka popup di map (INI YANG KAMU LUPA)
            openPopupByName(nama);

        });
}
</script>

<script>
    function setActiveKecamatan(nama) {

    document.querySelectorAll('.kec-item').forEach(el => {
        el.classList.remove('bg-emerald-200', 'font-bold');
    });

    const active = document.querySelector(`[data-kec="${nama.toLowerCase()}"]`);

    if (active) {
        active.classList.add('bg-emerald-200', 'font-bold');
    }
}
</script>

<script>
 function selectKelurahanByName(namaKel) {

    fetch("{{ asset('assets/js/Batas_Wilayah_KelurahanDesa_.json') }}")
        .then(res => res.json())
        .then(data => {

            const feature = data.features.find(f =>
                f.properties.WADMKD.toLowerCase().trim() ===
                namaKel.toLowerCase().trim()
            );



            const nama = feature
                ? feature.properties.WADMKD
                : namaKel;


            // highlight sidebar
            setActiveKelurahan(nama);

            // buka popup
            openPopupByName(nama);

        });

}
</script>

<script>
 function openPopupByName(namaKelurahan) {

    if (!geojsonLayer) return;

    geojsonLayer.eachLayer(function(layer) {

        const name = layer.feature.properties.WADMKD;

        if (
            name &&
            name.toLowerCase().trim() ===
            namaKelurahan.toLowerCase().trim()
        ) {

            layer.openPopup();

            mapInstance.fitBounds(
                layer.getBounds(),
                { padding: [30, 30] }
            );

        }

    });

}
</script>


<script>
 function setActiveKelurahan(nama) {

    document.querySelectorAll('.kel-item')
        .forEach(el => {

            el.classList.remove(
                'bg-emerald-200',
                'font-bold'
            );

        });

    const active =
        document.querySelector(
            `[data-kel="${nama.toLowerCase()}"]`
        );

    if (active) {

        active.classList.add(
            'bg-emerald-200',
            'font-bold'
        );

    }

}
</script>


<script>

    let geojsonData = null;

fetch("{{ asset('assets/js/Batas_Wilayah_KelurahanDesa_.json') }}")
    .then(res => res.json())
    .then(data => {

        geojsonData = data;

    });



    function loadKelurahan() {

    const kecamatan =
        document.getElementById('kecamatanSelect').value;

    const container =
        document.getElementById('kelurahanContainer');

    container.innerHTML = '';

    if (!geojsonData || !kecamatan) return;

    const kelurahan = geojsonData.features
        .filter(f => f.properties.WADMKC === kecamatan)
        .map(f => f.properties.WADMKD)
        .sort();

    kelurahan.forEach(nama => {

            container.innerHTML += `
            <span
                class="kel-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
                data-kel="${nama.toLowerCase()}"
                onclick="selectKelurahanByName('${nama}')">
                ${nama}
            </span>
            `;

    });

}
</script>