@extends('layouts.app')

@section('title', 'WebGIS PKH & BPNT Kota Palopo')

@section('content')
 
 
       <!-- ============================================== -->
        <!-- TAB: PROFIL                                    -->
        <!-- ============================================== -->
        <section id="tab-profil" class="tab-section py-12 px-4 md:px-8 max-w-7xl mx-auto">
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 p-8">
                <div class="flex flex-col md:flex-row gap-8 items-center border-b border-slate-100 pb-8 mb-8">
                    <div class="w-32 h-40 bg-slate-100 rounded-2xl flex items-center justify-center p-3 flex-shrink-0 shadow-md">
      
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Lambang_Kota_Palopo.png" alt="" srcset="">
             
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
@endsection