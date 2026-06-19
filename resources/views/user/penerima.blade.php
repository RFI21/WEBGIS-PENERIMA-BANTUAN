@extends('layouts.app')

@section('title', 'WebGIS PKH & BPNT Kota Palopo')

@section('content')
 
 
        <!-- ============================================== -->
        <!-- TAB: DATA PENERIMA                             -->
        <!-- ============================================== -->
        <section  class="tab-section  py-12 px-4 md:px-8 max-w-7xl mx-auto">
            
            <div class="bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Daftar Keluarga Penerima Manfaat (KPM) PKH</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Daftar lengkap warga terdaftar bantuan PKH  di wilayah administratif Kota Palopo.</p>
                    </div>

                </div>

                <!-- Filters & Search Bar -->
<form method="GET">

<div class="p-6 border-b border-slate-100 grid grid-cols-1 md:grid-cols-4 gap-4">

    <div class="md:col-span-2"></div>

    <!-- FILTER TAHUN PKH -->
    <div>
        <select 
            name="tahun_pkh"
            onchange="this.form.submit()"
            class="w-full px-4 py-2.5 rounded-xl border border-slate-200">

            <option value="all">Pilih Tahun</option>

            <option value="2021" {{ request('tahun_pkh') == '2021' ? 'selected' : '' }}>2021</option>
            <option value="2022" {{ request('tahun_pkh') == '2022' ? 'selected' : '' }}>2022</option>
            <option value="2023" {{ request('tahun_pkh') == '2023' ? 'selected' : '' }}>2023</option>
            <option value="2024" {{ request('tahun_pkh') == '2024' ? 'selected' : '' }}>2024</option>
            <option value="2025" {{ request('tahun_pkh') == '2025' ? 'selected' : '' }}>2025</option>

        </select>
    </div>

    <!-- FILTER KECAMATAN PKH -->
    <div>
        <select 
            name="kecamatan_pkh"
            onchange="this.form.submit()"
            class="w-full px-4 py-2.5 rounded-xl border border-slate-200">

<option value="all">Semua Kecamatan</option>

<option value="Wara" {{ request('kecamatan_bpnt') == 'Wara' ? 'selected' : '' }}>
    Kecamatan Wara
</option>

<option value="Wara Timur" {{ request('kecamatan_bpnt') == 'Wara Timur' ? 'selected' : '' }}>
    Kecamatan Wara Timur
</option>

<option value="Wara Barat" {{ request('kecamatan_bpnt') == 'Wara Barat' ? 'selected' : '' }}>
    Kecamatan Wara Barat
</option>

<option value="Wara Utara" {{ request('kecamatan_bpnt') == 'Wara Utara' ? 'selected' : '' }}>
    Kecamatan Wara Utara
</option>

<option value="Wara Selatan" {{ request('kecamatan_bpnt') == 'Wara Selatan' ? 'selected' : '' }}>
    Kecamatan Wara Selatan
</option>

<option value="Bara" {{ request('kecamatan_bpnt') == 'Bara' ? 'selected' : '' }}>
    Kecamatan Bara
</option>

<option value="Sendana" {{ request('kecamatan_bpnt') == 'Sendana' ? 'selected' : '' }}>
    Kecamatan Sendana
</option>

<option value="Telluwanua" {{ request('kecamatan_bpnt') == 'Telluwanua' ? 'selected' : '' }}>
    Kecamatan Telluwanua
</option>

<option value="Mungkajang" {{ request('kecamatan_bpnt') == 'Mungkajang' ? 'selected' : '' }}>
    Kecamatan Mungkajang
</option>

        </select>
    </div>

</div>

</form>

                    </form>

                <!-- Recipient Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                <th class="p-4 text-center">No</th>
                                <th class="p-4 text-center">Kecamatan</th>
                                <th class="p-4 text-center">Kelurahan</th>
                                <th class="p-4 text-center">PKH</th>
                                <th class="p-4 text-center">Keluarga Miskin</th>
                                <th class="p-4 text-center">Status</th>
                                <th class="p-4 text-center">%</th>
                            </tr>
                        </thead>
                        <tbody id="recipientTableBody" class="divide-y divide-slate-100 text-base">
                            @forelse($penerimass as $i => $p)
@php
    $persen = 0;

    if($p->jumlah_keluarga > 0){
        $persen = ($p->jumlah_pkh / $p->jumlah_keluarga) * 100;
    }

    if($persen <= 20){
        $status = 'Sangat Rendah';
        $class = 'bg-red-100 text-red-700';
    }
    elseif($persen <= 40){
        $status = 'Rendah';
        $class = 'bg-orange-100 text-orange-700';
    }
    elseif($persen <= 60){
        $status = 'Sedang';
        $class = 'bg-yellow-100 text-yellow-700';
    }
    elseif($persen <= 80){
        $status = 'Tinggi';
        $class = 'bg-blue-100 text-blue-700';
    }
    else{
        $status = 'Sangat Tinggi';
        $class = 'bg-emerald-100 text-emerald-700';
    }
@endphp
                        <tr class="text-center">
                            <td class="p-4">{{ $i+1 }}</td>
                            <td class="p-4">{{ $p->kecamatan }}</td>
                            <td class="p-4">{{ $p->kelurahan }}</td>
                            <td class="p-4">{{ $p->jumlah_pkh }}</td>
                            <td class="p-4">{{ $p->jumlah_keluarga }}</td>
                            <!-- <td class="px-4 py-5">

                                @if($persen >= 80)

                                    <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Merata
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
                                        Tidak Merata
                                    </span>

                                @endif

                            </td> -->

                            <td class="px-4 py-5">
                                <span class="{{ $class }} px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $status }}
                                </span>
                            </td>

                            <!-- PERSEN -->
                            <td class="px-4 py-5 font-semibold">
                                {{ number_format($persen, 1) }}%
                            </td>
                                    </tr>
                                                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                            Belum ada data penerima.
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer Pagination -->
             <div class="p-4 border-t border-slate-100 bg-slate-50">

                    <div class="flex flex-col md:flex-row justify-between items-center gap-3">

<div class="p-4 border-t border-slate-100 bg-slate-50 flex justify-center">
    
    <div class="flex items-center gap-2">

        {{-- pagination di sini --}}

    </div>

</div>

                        <div class="flex items-center gap-2">

    {{-- Tombol Previous --}}
    @if ($penerimass->onFirstPage())

        <span class="px-4 py-2 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed">
            Prev
        </span>

    @else

{{-- Previous --}}
<a href="{{ $penerimass->appends(request()->query())->previousPageUrl() }}"
                class="px-4 py-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition">
                    Prev
        </a>

    @endif


    {{-- Nomor Halaman --}}
    @for ($i = 1; $i <= $penerimass->lastPage(); $i++)

{{-- Nomor halaman --}}
<a href="{{ $penerimass->appends(request()->query())->url($i) }}"
                    class="px-4 py-2 rounded-xl transition
                    {{ $penerimass->currentPage() == $i
                        ? 'bg-emerald-600 text-white shadow-md'
                        : 'bg-slate-100 text-slate-700 hover:bg-emerald-100' }}">
                        {{ $i }}
            </a>

    @endfor


    {{-- Tombol Next --}}
    @if ($penerimass->hasMorePages())

{{-- Next --}}
<a href="{{ $penerimass->appends(request()->query())->nextPageUrl() }}"
                class="px-4 py-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition">
                    Next
        </a>

    @else

        <span class="px-4 py-2 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed">
            Next
        </span>

    @endif

</div>

                    </div>

                </div>
            </div>



            <!-- SECSION 2 -->
            <div class="bg-white mt-20 rounded-2xl shadow-md border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Daftar Keluarga Penerima Manfaat (KPM) BPNT</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Daftar lengkap warga terdaftar bantuan  BPNT di wilayah administratif Kota Palopo.</p>
                    </div>

                </div>

                <!-- Filters & Search Bar -->
<form method="GET">

<div class="p-6 border-b border-slate-100 grid grid-cols-1 md:grid-cols-4 gap-4">

    <div class="md:col-span-2"></div>

    <!-- FILTER TAHUN BPNT -->
    <div>
        <select 
            name="tahun_bpnt"
            onchange="this.form.submit()"
            class="w-full px-4 py-2.5 rounded-xl border border-slate-200">

            <option value="all">Pilih Tahun</option>

            <option value="2021" {{ request('tahun_bpnt') == '2021' ? 'selected' : '' }}>2021</option>
            <option value="2022" {{ request('tahun_bpnt') == '2022' ? 'selected' : '' }}>2022</option>
            <option value="2023" {{ request('tahun_bpnt') == '2023' ? 'selected' : '' }}>2023</option>
            <option value="2024" {{ request('tahun_bpnt') == '2024' ? 'selected' : '' }}>2024</option>
            <option value="2025" {{ request('tahun_bpnt') == '2025' ? 'selected' : '' }}>2025</option>

        </select>
    </div>

    <!-- FILTER KECAMATAN BPNT -->
    <div>
        <select 
            name="kecamatan_bpnt"
            onchange="this.form.submit()"
            class="w-full px-4 py-2.5 rounded-xl border border-slate-200">

<option value="all">Semua Kecamatan</option>

<option value="Wara" {{ request('kecamatan_bpnt') == 'Wara' ? 'selected' : '' }}>
    Kecamatan Wara
</option>

<option value="Wara Timur" {{ request('kecamatan_bpnt') == 'Wara Timur' ? 'selected' : '' }}>
    Kecamatan Wara Timur
</option>

<option value="Wara Barat" {{ request('kecamatan_bpnt') == 'Wara Barat' ? 'selected' : '' }}>
    Kecamatan Wara Barat
</option>

<option value="Wara Utara" {{ request('kecamatan_bpnt') == 'Wara Utara' ? 'selected' : '' }}>
    Kecamatan Wara Utara
</option>

<option value="Wara Selatan" {{ request('kecamatan_bpnt') == 'Wara Selatan' ? 'selected' : '' }}>
    Kecamatan Wara Selatan
</option>

<option value="Bara" {{ request('kecamatan_bpnt') == 'Bara' ? 'selected' : '' }}>
    Kecamatan Bara
</option>

<option value="Sendana" {{ request('kecamatan_bpnt') == 'Sendana' ? 'selected' : '' }}>
    Kecamatan Sendana
</option>

<option value="Telluwanua" {{ request('kecamatan_bpnt') == 'Telluwanua' ? 'selected' : '' }}>
    Kecamatan Telluwanua
</option>

<option value="Mungkajang" {{ request('kecamatan_bpnt') == 'Mungkajang' ? 'selected' : '' }}>
    Kecamatan Mungkajang
</option>

        </select>
    </div>

</div>

</form>

                <!-- Recipient Table Container -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                <th class="p-4 text-center">No</th>
                                <th class="p-4 text-center">Kecamatan</th>
                                <th class="p-4 text-center">Kelurahan</th>
                                <th class="p-4 text-center">BPNT</th>
                                <th class="p-4 text-center">Keluarga Miskin</th>
                                <th class="p-4 text-center">Status</th>
                                <th class="p-4 text-center">%</th>
                            </tr>
                        </thead>
                        <tbody id="recipientTableBody" class="divide-y divide-slate-100 text-base">
        @forelse($penerimas as $i => $p)
@php
    $persen = 0;

    if($p->jumlah_keluarga > 0){
        $persen = ($p->jumlah_pkh / $p->jumlah_keluarga) * 100;
    }

    if($persen <= 20){
        $status = 'Sangat Rendah';
        $class = 'bg-red-100 text-red-700';
    }
    elseif($persen <= 40){
        $status = 'Rendah';
        $class = 'bg-orange-100 text-orange-700';
    }
    elseif($persen <= 60){
        $status = 'Sedang';
        $class = 'bg-yellow-100 text-yellow-700';
    }
    elseif($persen <= 80){
        $status = 'Tinggi';
        $class = 'bg-blue-100 text-blue-700';
    }
    else{
        $status = 'Sangat Tinggi';
        $class = 'bg-emerald-100 text-emerald-700';
    }
@endphp
                        <tr class="text-center">
                            <td class="p-4">{{ $i+1 }}</td>
                            <td class="p-4">{{ $p->kecamatan }}</td>
                            <td class="p-4">{{ $p->kelurahan }}</td>
                            <td class="p-4">{{ $p->jumlah_bpnt }}</td>
                            <td class="p-4">{{ $p->jumlah_keluarga }}</td>
                            <!-- <td class="px-4 py-5">

                                @if($persen >= 80)

                                    <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Merata
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
                                        Tidak Merata
                                    </span>

                                @endif

                            </td> -->

                            <td class="px-4 py-5">
                                <span class="{{ $class }} px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $status }}
                                </span>
                            </td>

                            <!-- PERSEN -->
                            <td class="px-4 py-5 font-semibold">
                                {{ number_format($persen, 1) }}%
                            </td>
                        </tr>
                       @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                            Belum ada data penerima.
                            </td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer Pagination -->
                <div class="p-4 border-t border-slate-100 bg-slate-50">

                    <div class="flex flex-col md:flex-row justify-between items-center gap-3">

<div class="p-4 border-t border-slate-100 bg-slate-50 flex justify-center">
    
    <div class="flex items-center gap-2">

        {{-- pagination di sini --}}

    </div>

</div>

                        <div class="flex items-center gap-2">

    {{-- Tombol Previous --}}
    @if ($penerimas->onFirstPage())

        <span class="px-4 py-2 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed">
            Prev
        </span>

    @else

{{-- Previous --}}
<a href="{{ $penerimas->appends(request()->query())->previousPageUrl() }}"
                class="px-4 py-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition">
                    Prev
        </a>

    @endif


    {{-- Nomor Halaman --}}
    @for ($i = 1; $i <= $penerimas->lastPage(); $i++)

{{-- Nomor halaman --}}
<a href="{{ $penerimas->appends(request()->query())->url($i) }}"
                class="px-4 py-2 rounded-xl transition
                {{ $penerimas->currentPage() == $i
                    ? 'bg-emerald-600 text-white shadow-md'
                    : 'bg-slate-100 text-slate-700 hover:bg-emerald-100' }}">
                    {{ $i }}
        </a>

    @endfor


    {{-- Tombol Next --}}
    @if ($penerimas->hasMorePages())

{{-- Next --}}
<a href="{{ $penerimas->appends(request()->query())->nextPageUrl() }}"
                class="px-4 py-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition">
                    Next
        </a>

    @else

        <span class="px-4 py-2 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed">
            Next
        </span>

    @endif

</div>

                    </div>

                </div>
            </div>
        </section>
@endsection