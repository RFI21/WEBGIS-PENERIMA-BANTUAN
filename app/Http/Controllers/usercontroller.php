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
    // REKAP PER KECAMATAN
    // =========================
    $dataKecamatan = penerima::select(
            'kecamatan',
            DB::raw('SUM(jumlah_bpnt) as total_bpnt'),
            DB::raw('SUM(jumlah_keluarga) as total_keluarga')
        )
        ->groupBy('kecamatan')
        ->get();

    // =========================
    // WARNA KECAMATAN
    // =========================
    $warnaKecamatan = [];

    foreach ($dataKecamatan as $item) {

        $persen = 0;

        if ($item->total_keluarga > 0) {

            $persen = (
                $item->total_bpnt / $item->total_keluarga
            ) * 100;
        }

        // =========================
        // KLASIFIKASI WARNA
        // =========================
        if ($persen >= 80) {

            $warna = '#16a34a'; // hijau
            $status = 'Tinggi / Merata';

        } elseif ($persen >= 50) {

            $warna = '#facc15'; // kuning
            $status = 'Sedang';

        } else {

            $warna = '#dc2626'; // merah
            $status = 'Rendah / Tidak Merata';
        }

        $warnaKecamatan[$item->kecamatan] = [
            'warna' => $warna,
            'persen' => round($persen, 1),
            'status' => $status,
            'bpnt' => $item->total_bpnt,
            'keluarga' => $item->total_keluarga
        ];
    }

    return view('user.bpnt', compact(
        'bpnt',
        'warnaKecamatan'
    ));
}


public function pkh()
{
    $pkh = Penerima::all();

    // =========================
    // REKAP PER KECAMATAN
    // =========================
    $dataKecamatan = Penerima::select(
            'kecamatan',
            DB::raw('SUM(jumlah_pkh) as total_pkh'),
            DB::raw('SUM(jumlah_keluarga) as total_keluarga')
        )
        ->groupBy('kecamatan')
        ->get();

    // =========================
    // WARNA KECAMATAN
    // =========================
    $warnaKecamatan = [];

    foreach ($dataKecamatan as $item) {

        $persen = 0;

        if ($item->total_keluarga > 0) {

            $persen = (
                $item->total_pkh / $item->total_keluarga
            ) * 100;
        }

        // KLASIFIKASI WARNA
        if ($persen >= 80) {

            $warna = '#16a34a'; // hijau

            $status = 'Tinggi / Merata';

        } elseif ($persen >= 50) {

            $warna = '#facc15'; // kuning

            $status = 'Sedang';

        } else {

            $warna = '#dc2626'; // merah

            $status = 'Rendah / Tidak Merata';
        }

        $warnaKecamatan[$item->kecamatan] = [
            'warna' => $warna,
            'persen' => round($persen, 1),
            'status' => $status,
            'pkh' => $item->total_pkh,
            'keluarga' => $item->total_keluarga
        ];
    }

    return view('user.pkh', compact(
        'pkh',
        'warnaKecamatan'
    ));
}

 public function bansos()
{
    // =========================
    // BAR CHART KECAMATAN
    // =========================
    $data = penerima::select(
            'kecamatan',
            DB::raw('SUM(jumlah_pkh) as total_pkh'),
            DB::raw('SUM(jumlah_bpnt) as total_bpnt')
        )
        ->groupBy('kecamatan')
        ->get();

    $labels = [
        'Wara',
        'Wara Timur',
        'Wara Barat',
        'Wara Utara',
        'Wara Selatan',
        'Bara',
        'Sendana',
        'Telluwanua',
        'Mungkajang'
    ];

    $pkhData = [];
    $bpntData = [];

    foreach ($labels as $kecamatan) {

        $row = $data->firstWhere('kecamatan', $kecamatan);

        $pkhData[] = $row ? $row->total_pkh : 0;
        $bpntData[] = $row ? $row->total_bpnt : 0;
    }


    // =========================
    // LINE CHART TAHUN
    // =========================
    $tahunData = penerima::select(
            'tahun',
            DB::raw('SUM(jumlah_pkh) as total_pkh'),
            DB::raw('SUM(jumlah_bpnt) as total_bpnt')
        )
        ->groupBy('tahun')
        ->orderBy('tahun', 'asc')
        ->get();

    $labelsTahun = [];
    $pkhTahun = [];
    $bpntTahun = [];

    foreach ($tahunData as $item) {

        $labelsTahun[] = $item->tahun;
        $pkhTahun[] = $item->total_pkh;
        $bpntTahun[] = $item->total_bpnt;
    }


    return view('user.bansos', compact(
        'labels',
        'pkhData',
        'bpntData',
        'labelsTahun',
        'pkhTahun',
        'bpntTahun'
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
