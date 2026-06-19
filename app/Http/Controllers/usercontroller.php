<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kemiskinan;
use App\Models\penerima;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class usercontroller extends Controller
{
    //home
    public function index()
    {

        $totalPKH = Penerima::sum('jumlah_pkh');

    $totalBPNT = Penerima::sum('jumlah_bpnt');

    return view('user.index', compact(
        'totalPKH',
        'totalBPNT'
    ));
        
        }
        
    public function login()
        {
        return view('user.login');
        }



  
    public function kemiskinan()
    {

        $kemiskinans = kemiskinan::orderBy('desil', 'asc')
    ->get();

        return view('user.kemiskinan', compact('kemiskinans'));
    }
    

public function bpnt()
{
    $bpnt = penerima::all();

   // =========================
    // REKAP PER KELURAHAN
    // =========================
    $dataKelurahan = Penerima::select(
            'kelurahan',
            'kecamatan',
            DB::raw('SUM(jumlah_bpnt) as total_bpnt'),
            DB::raw('SUM(jumlah_keluarga) as total_keluarga')
        )
        ->groupBy('kelurahan', 'kecamatan')
        ->get();

    // =========================
    // WARNA KELURAHAN
    // =========================
 $warnaKelurahan = [];

foreach ($dataKelurahan as $item) {

    $persen = 0;

    if ($item->total_keluarga > 0) {
        $persen = (
            $item->total_bpnt /
            $item->total_keluarga
        ) * 100;
    }

    if ($persen <= 20) {

        $warna = '#dc2626'; // Merah
        $status = 'Sangat Rendah';

    } elseif ($persen <= 40) {

        $warna = '#f97316'; // Orange
        $status = 'Rendah';

    } elseif ($persen <= 60) {

        $warna = '#facc15'; // Kuning
        $status = 'Sedang';

    } elseif ($persen <= 80) {

        $warna = '#3b82f6'; // Biru
        $status = 'Tinggi';

    } else {

        $warna = '#16a34a'; // Hijau
        $status = 'Sangat Tinggi';
    }

    $warnaKelurahan[$item->kelurahan] = [
        'warna' => $warna,
        'persen' => round($persen, 1),
        'status' => $status,
        'bpnt' => $item->total_bpnt,
        'keluarga' => $item->total_keluarga,
        'kecamatan' => $item->kecamatan
    ];
}

    return view('user.bpnt', compact(
        'bpnt',
        'warnaKelurahan'
    ));
}


public function pkh()
{
    $pkh = Penerima::all();

    // =========================
    // REKAP PER KELURAHAN
    // =========================
    $dataKelurahan = Penerima::select(
            'kelurahan',
            'kecamatan',
            DB::raw('SUM(jumlah_pkh) as total_pkh'),
            DB::raw('SUM(jumlah_keluarga) as total_keluarga')
        )
        ->groupBy('kelurahan', 'kecamatan')
        ->get();

    // =========================
    // WARNA KELURAHAN
    // =========================
 $warnaKelurahan = [];

foreach ($dataKelurahan as $item) {

    $persen = 0;

    if ($item->total_keluarga > 0) {
        $persen = (
            $item->total_pkh /
            $item->total_keluarga
        ) * 100;
    }

    if ($persen <= 20) {

        $warna = '#dc2626'; // Merah
        $status = 'Sangat Rendah';

    } elseif ($persen <= 40) {

        $warna = '#f97316'; // Orange
        $status = 'Rendah';

    } elseif ($persen <= 60) {

        $warna = '#facc15'; // Kuning
        $status = 'Sedang';

    } elseif ($persen <= 80) {

        $warna = '#3b82f6'; // Biru
        $status = 'Tinggi';

    } else {

        $warna = '#16a34a'; // Hijau
        $status = 'Sangat Tinggi';
    }

    $warnaKelurahan[$item->kelurahan] = [
        'warna' => $warna,
        'persen' => round($persen, 1),
        'status' => $status,
        'pkh' => $item->total_pkh,
        'keluarga' => $item->total_keluarga,
        'kecamatan' => $item->kecamatan
    ];
}

    return view('user.pkh', compact(
        'pkh',
        'warnaKelurahan'
    ));
}



public function bansos(Request $request)
{
    $tahun = $request->tahun;
    $kecamatan = $request->kecamatan;

    $query = Penerima::query();

    if ($tahun) {
        $query->where('tahun', $tahun);
    }

    // =====================================
    // FILTER KECAMATAN → TAMPIL PER KELURAHAN
    // =====================================
    if ($kecamatan) {

        $data = $query->select(
                'kelurahan',
                DB::raw('SUM(jumlah_pkh) as total_pkh'),
                DB::raw('SUM(jumlah_bpnt) as total_bpnt')
            )
            ->where('kecamatan', $kecamatan)
            ->groupBy('kelurahan')
            ->get();

        // Ambil semua kelurahan dari GeoJSON
        $geojson = json_decode(
            file_get_contents(
                public_path('assets/js/Batas_Wilayah_KelurahanDesa_.json')
            ),
            true
        );

        $labels = [];

        foreach ($geojson['features'] as $feature) {

            if (
                strtolower(trim($feature['properties']['WADMKC'])) ===
                strtolower(trim($kecamatan))
            ) {

                $labels[] =
                    trim($feature['properties']['WADMKD']);
            }
        }

        $labels = array_unique($labels);
        sort($labels);

        $pkhData = [];
        $bpntData = [];

        foreach ($labels as $kelurahan) {

            $row = $data->first(function ($item) use ($kelurahan) {
                return strtolower(trim($item->kelurahan))
                    === strtolower(trim($kelurahan));
            });

            $pkhData[] = $row ? (int) $row->total_pkh : 0;
            $bpntData[] = $row ? (int) $row->total_bpnt : 0;
        }

    } else {

        // =====================================
        // TAMPIL PER KECAMATAN
        // =====================================
        $data = $query->select(
                'kecamatan',
                DB::raw('SUM(jumlah_pkh) as total_pkh'),
                DB::raw('SUM(jumlah_bpnt) as total_bpnt')
            )
            ->groupBy('kecamatan')
            ->orderBy('kecamatan')
            ->get();

        $labels = $data->pluck('kecamatan')->toArray();
        $pkhData = $data->pluck('total_pkh')->toArray();
        $bpntData = $data->pluck('total_bpnt')->toArray();
    }

    // =========================
    // DATA FILTER
    // =========================
    $tahunList = Penerima::select('tahun')
        ->distinct()
        ->orderBy('tahun', 'desc')
        ->pluck('tahun');

    $kecamatanList = Penerima::select('kecamatan')
        ->distinct()
        ->orderBy('kecamatan')
        ->pluck('kecamatan');

    // =========================
    // LINE CHART (TETAP)
    // =========================
    $tahunData = Penerima::select(
            'tahun',
            DB::raw('SUM(jumlah_pkh) as total_pkh'),
            DB::raw('SUM(jumlah_bpnt) as total_bpnt')
        )
        ->groupBy('tahun')
        ->orderBy('tahun')
        ->get();

    $labelsTahun = $tahunData->pluck('tahun')->toArray();
    $pkhTahun = $tahunData->pluck('total_pkh')->toArray();
    $bpntTahun = $tahunData->pluck('total_bpnt')->toArray();

    return view('user.bansos', compact(
        'labels',
        'pkhData',
        'bpntData',
        'labelsTahun',
        'pkhTahun',
        'bpntTahun',
        'tahunList',
        'kecamatanList',
        'tahun',
        'kecamatan'
    ));
}

public function penerima(Request $request)
{
   // =========================
    // PKH
    // =========================
    $queryPKH = Penerima::query();

    if ($request->tahun_pkh && $request->tahun_pkh != 'all') {
        $queryPKH->where('tahun', $request->tahun_pkh);
    }

    if ($request->kecamatan_pkh && $request->kecamatan_pkh != 'all') {
        $queryPKH->where('kecamatan', $request->kecamatan_pkh);
    }

    $penerimass = $queryPKH
        ->paginate(10, ['*'], 'pkh_page');



    // =========================
    // BPNT
    // =========================
    $queryBPNT = Penerima::query();

    if ($request->tahun_bpnt && $request->tahun_bpnt != 'all') {
        $queryBPNT->where('tahun', $request->tahun_bpnt);
    }

    if ($request->kecamatan_bpnt && $request->kecamatan_bpnt != 'all') {
        $queryBPNT->where('kecamatan', $request->kecamatan_bpnt);
    }

    $penerimas = $queryBPNT
        ->paginate(10, ['*'], 'bpnt_page');


    return view('user.penerima', compact('penerimas', 'penerimass'));
}
  
    
    public function profil()
    {

        return view('user.profil');
    }
      

public function laporan()
{
    $laporan = Penerima::select(
            'tahun',
            DB::raw('SUM(jumlah_pkh) as total_pkh'),
            DB::raw('SUM(jumlah_bpnt) as total_bpnt'),
            DB::raw('SUM(jumlah_keluarga) as total_keluarga')
        )
        ->groupBy('tahun')
        ->orderBy('tahun', 'desc')
        ->get();

    return view('user.laporan', compact('laporan'));
}


public function downloadLaporan($tahun)
{
    $data = Penerima::where('tahun', $tahun)->get();

    $pdf = Pdf::loadView('pdf.laporan', [
        'data' => $data,
        'tahun' => $tahun
    ]);

    return $pdf->download('laporan-bansos-'.$tahun.'.pdf');
}


        }
