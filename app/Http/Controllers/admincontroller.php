<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\fasilitas;
use Illuminate\Support\Facades\Storage;
use App\Models\penerima;


class admincontroller extends Controller
{
    //dashboard
    public function index()
    {

    // TOTAL PKH
    $jumlahPKH = penerima::sum('jumlah_pkh');

    // TOTAL BPNT
    $jumlahBPNT = penerima::sum('jumlah_bpnt');

    // TOTAL KELUARGA
    $jumlahKeluarga = penerima::sum('jumlah_keluarga');

        $admins = User::all(); 
        return view('admin.index', compact(
            'admins',    
        'jumlahPKH',
        'jumlahBPNT',
        'jumlahKeluarga'));
    }



    //adminaccount
    public function admin()
    {
        $admins = User::all(); // Ambil semua data dari tabel admins
        return view('admin.admin', compact('admins'));
    }
    // hapus admin
    public function hapusadmin($id)
{
    $admin = User::findOrFail($id);
    $admin->delete();

    return redirect()->route('admin.admin')->with('success', 'Admin berhasil dihapus');
}

 

}