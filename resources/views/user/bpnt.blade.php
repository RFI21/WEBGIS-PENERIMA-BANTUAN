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
                            <i class="fa-solid fa-map-location-dot text-amber-300 animate-bounce"></i> Peta Penerima Bantuan BPNT Kota Palopo
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
    <i class="fa-solid fa-map"></i>
    Legenda Tingkat Pemerataan BPNT
</h4>

<div class="space-y-3">

    <!-- Tinggi -->
    <div class="flex items-center gap-3">
        <span class="w-4 h-4 rounded bg-[#16a34a] border border-white shadow"></span>

        <div>
            <p class="text-slate-700 font-semibold text-xs">
                Tinggi / Merata
            </p>

            <p class="text-[10px] text-slate-500">
                Persentase penerima ≥ 80%
            </p>
        </div>
    </div>

    <!-- Sedang -->
    <div class="flex items-center gap-3">
        <span class="w-4 h-4 rounded bg-[#facc15] border border-white shadow"></span>

        <div>
            <p class="text-slate-700 font-semibold text-xs">
                Sedang
            </p>

            <p class="text-[10px] text-slate-500">
                Persentase penerima 50% - 79%
            </p>
        </div>
    </div>

    <!-- Rendah -->
    <div class="flex items-center gap-3">
        <span class="w-4 h-4 rounded bg-[#dc2626] border border-white shadow"></span>

        <div>
            <p class="text-slate-700 font-semibold text-xs">
                Rendah / Tidak Merata
            </p>

            <p class="text-[10px] text-slate-500">
                Persentase penerima &lt; 50%
            </p>
        </div>
    </div>

</div>

<p class="text-[9px] text-slate-400 italic pt-3 border-t border-slate-100 mt-3">
    Warna wilayah menunjukkan tingkat pemerataan bantuan PKH berdasarkan data keluarga penerima manfaat.
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
                                 <span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="wara"
      onclick="selectKecamatanByName('wara')">
    Wara
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="wara timur"
      onclick="selectKecamatanByName('wara timur')">
    Wara Timur
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="wara barat"
      onclick="selectKecamatanByName('wara barat')">
    Wara Barat
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="wara utara"
      onclick="selectKecamatanByName('wara utara')">
    Wara Utara
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="wara selatan"
      onclick="selectKecamatanByName('wara selatan')">
    Wara Selatan
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="bara"
      onclick="selectKecamatanByName('bara')">
    Bara
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="mungkajang"
      onclick="selectKecamatanByName('mungkajang')">
    Mungkajang
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="sendana"
      onclick="selectKecamatanByName('sendana')">
    Sendana
</span>

<span class="kec-item bg-white border border-slate-200 p-2 rounded-lg text-center font-medium shadow-sm hover:border-brand-600 hover:bg-emerald-50 cursor-pointer transition"
      data-kec="telluwanua"
      onclick="selectKecamatanByName('telluwanua')">
    Telluwanua
</span>
                                </div>
                            </div>


                             <div>
<div id="map-selected-info"
    class="p-5 bg-white rounded-2xl border border-slate-200 shadow-sm">

    <h4
        class="text-xs font-bold text-slate-700 uppercase tracking-wide border-b border-slate-100 pb-3 mb-5">
        Statistik BPNT Kecamatan
    </h4>

    <!-- Nama Kecamatan -->
    <div class="text-center mb-4">

        <h3 id="namaKecamatan"
            class="text-lg font-bold text-emerald-700">
            -
        </h3>

        <p class="text-[11px] text-slate-400">
            Klik wilayah kecamatan pada peta
        </p>

    </div>

    <!-- CHART -->
    <div class="flex justify-center">

        <div id="chartLingkaran"
            class="relative w-40 h-40 rounded-full transition-all duration-700 ease-in-out
            bg-[conic-gradient(#16a34a_0deg_0deg,#f59e0b_0deg_360deg)]">

            <div
                class="absolute inset-5 bg-white rounded-full flex flex-col items-center justify-center text-center">

                <span id="jumlahPkh"
                    class="text-2xl font-extrabold text-slate-800 transition-all duration-500">
                    -
                </span>

                <span class="text-[11px] text-slate-500">
                    Penerima BPNT
                </span>

            </div>

        </div>

    </div>

    <!-- DETAIL -->
    <div class="mt-6 space-y-3">

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-emerald-600"></span>

                <span class="text-xs text-slate-600">
                    Total BPNT
                </span>
            </div>

            <span id="detailPkh"
                class="text-xs font-bold text-slate-700">
                -
            </span>

        </div>

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-amber-500"></span>

                <span class="text-xs text-slate-600">
                    Total Keluarga
                </span>
            </div>

            <span id="detailKeluarga"
                class="text-xs font-bold text-slate-700">
                -
            </span>

        </div>

        <div class="flex items-center justify-between">

            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-blue-500"></span>

                <span class="text-xs text-slate-600">
                    Persentase
                </span>
            </div>

            <span id="detailPersen"
                class="text-xs font-bold text-slate-700">
                -
            </span>

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

function initGisMap(filterType = 'all') {

    setTimeout(() => {

        const mapContainer =
            document.getElementById('gisMap');

        if (!mapContainer) {
            console.log('Container gisMap tidak ditemukan');
            return;
        }

        // hapus map lama
        if (mapInstance !== null) {
            mapInstance.remove();
            mapInstance = null;
        }

        // buat map
        mapInstance = L.map('gisMap', {
            zoomControl: false
        });

        mapInstance.setView(PALOPO_COORDS, 12);

        // basemap
        L.tileLayer(
            'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png',
            {
                attribution: '&copy; OpenStreetMap &copy; CartoDB',
                subdomains: 'abcd',
                maxZoom: 20
            }
        ).addTo(mapInstance);

        // zoom control
        L.control.zoom({
            position: 'topright'
        }).addTo(mapInstance);

        // data warna
        const kecamatanColors =
            @json($warnaKecamatan);

        // load geojson
        fetch("{{ asset('assets/js/kecamatan.geojson') }}")

            .then(response => response.json())

            .then(data => {

                geojsonLayer = L.geoJSON(data, {

                    // style polygon
                    style: function(feature) {

                        const kec =
                            feature.properties.nm_kecamatan?.trim();

                        return {
                            color: '#ffffff',
                            weight: 2,
                            fillColor: kecamatanColors[kec]
                                ? kecamatanColors[kec].warna
                                : '#cbd5e1',
                            fillOpacity: 0.5
                        };

                    },

                    // event tiap feature
                    onEachFeature: function(feature, layer) {

                        const namaKec =
                            feature.properties.nm_kecamatan;

                        const info =
                            kecamatanColors[namaKec];

                        // popup
                        layer.bindPopup(`
                            <div class="text-sm">

                                <h3 class="font-bold text-emerald-700 mb-2">
                                    Kecamatan ${namaKec}
                                </h3>

                                <div class="space-y-1 text-xs text-slate-600">
                                    <p>Total PKH : ${info ? info.bpnt : 0}</p>
                                    <p>Total Keluarga : ${info ? info.keluarga : 0}</p>
                                    <p>Persentase : ${info ? info.persen : 0}%</p>
                                    <p>Status : ${info ? info.status : '-'}</p>
                                </div>

                            </div>
                        `);

                        // hover
                        layer.on('mouseover', function() {

                            this.setStyle({
                                fillOpacity: 0.8,
                                weight: 3
                            });

                        });

                        // mouse out
                        layer.on('mouseout', function() {

                            geojsonLayer.resetStyle(this);

                        });

                        // click polygon
layer.on('click', function () {
    layer.openPopup(); // pastikan popup tetap tampil
    updateChart(namaKec, info || null);
    setActiveKecamatan(namaKec);
    selectKecamatanByName(namaKec);
});

                    }

                }).addTo(mapInstance);

                // render marker
                renderMapMarkers(filterType);

            })

            .catch(error => {

                console.log(
                    'Gagal load GeoJSON:',
                    error
                );

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

            const kecamatanColors = @json($warnaKecamatan);

            const info = feature ? kecamatanColors[feature.properties.nm_kecamatan] : null;
            const nama = feature ? feature.properties.nm_kecamatan : namaKec;

            // 1. update chart
            updateChart(nama, info);

            // 2. highlight sidebar
            setActiveKecamatan(nama);

            // 3. buka popup di map (INI YANG KAMU LUPA)
            openPopupByName(nama);

        });
}
</script>

<script>
    function openPopupByName(namaKec) {

    if (!geojsonLayer) return;

    geojsonLayer.eachLayer(function(layer) {

        const name = layer.feature.properties.nm_kecamatan;

        if (name === namaKec) {

            layer.openPopup(); // 🔥 INI YANG MEMUNCULKAN POPUP

            mapInstance.setView(layer.getBounds().getCenter(), 12);

        }

    });
}
</script>

<script>
   function updateChart(namaKec, info) {

    // set nama kecamatan tetap muncul
    document.getElementById('namaKecamatan').innerText = namaKec;

    // kalau data kosong → RESET semua
    if (!info) {

        animateValue('jumlahPkh', 0);
        animateValue('detailPkh', 0);
        animateValue('detailKeluarga', 0);

        document.getElementById('detailPersen').innerText = '0%';

        document.getElementById('chartLingkaran').style.background =
            `conic-gradient(#16a34a 0deg 0deg,#f59e0b 0deg 360deg)`;

        return;
    }

    // update angka
    animateValue('jumlahPkh', info.bpnt || 0);
    animateValue('detailPkh', info.bpnt || 0);
    animateValue('detailKeluarga', info.keluarga || 0);

    document.getElementById('detailPersen').innerText =
        (info.persen || 0) + '%';

    // aman dari pembagian nol
    let degree = 0;

    if (info.keluarga > 0) {
        degree = (info.bpnt / info.keluarga) * 360;
    }

    if (degree > 360) degree = 360;

    document.getElementById('chartLingkaran').style.background =
        `conic-gradient(
            #16a34a 0deg ${degree}deg,
            #f59e0b ${degree}deg 360deg
        )`;
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
    function animateValue(id, end) {

    let start = 0;

    const element = document.getElementById(id);

    const duration = 800;

    const increment = end / 40;

    const timer = setInterval(() => {

        start += increment;

        if (start >= end) {

            element.innerText =
                Number(end).toLocaleString('id-ID');

            clearInterval(timer);

        } else {

            element.innerText =
                Math.floor(start).toLocaleString('id-ID');
        }

    }, duration / 40);
}
</script>