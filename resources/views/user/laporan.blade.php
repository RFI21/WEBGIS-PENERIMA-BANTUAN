@extends('layouts.app')

@section('title', 'Laporan PKH & BPNT Kota Palopo')

@section('content')

<section class="py-12 px-4 md:px-8 max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="mb-10 text-center">

        <h1 class="text-3xl font-extrabold text-slate-800">
            Laporan Data Bantuan Sosial
        </h1>

        <p class="text-slate-500 mt-2 text-sm">
            Unduh laporan penerima bantuan PKH dan BPNT berdasarkan tahun pendataan.
        </p>

    </div>

    <!-- LIST LAPORAN -->
 <!-- CONTAINER LAPORAN -->
<div class="bg-white rounded-3xl border border-slate-100 shadow-md overflow-hidden">

    <!-- HEADER CONTAINER -->
    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50">

        <h2 class="text-lg font-bold text-slate-800 flex items-center gap-2">
            <i class="fa-solid fa-folder-open text-emerald-600"></i>
            Arsip Laporan Bantuan Sosial
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Daftar laporan penerima bantuan PKH dan BPNT berdasarkan tahun.
        </p>

    </div>

    <!-- LIST -->
    <div class="divide-y divide-slate-100">

        @foreach($laporan as $item)

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-6 hover:bg-slate-50 transition">

            <!-- LEFT -->
            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-file-pdf text-2xl text-emerald-600"></i>
                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Laporan PKH & BPNT {{ $item->tahun }}
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Dinas Sosial Kota Palopo
                    </p>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-3">

                <span class="bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-2 rounded-full">
                    Tahun {{ $item->tahun }}
                </span>

                <a href="{{ route('laporan.download', $item->tahun) }}"
                   class="flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-3 rounded-2xl transition-all">

                    <i class="fa-solid fa-download"></i>

                    Unduh

                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

</section>

@endsection