<?php

namespace App\Http\Controllers;

use App\Models\penerima;
use App\Models\User;

use Illuminate\Http\Request;

class penerimaController extends Controller
{
    // READ
    public function index()
    {
        $admins = User::all();

        $penerimas = penerima::orderBy('kecamatan', 'asc')->paginate(10);
        return view('admin.penerima', compact('penerimas','admins'));
    }

    // CREATE FORM
    public function create()
    {
        $admins = User::all();

        return view('admin.tambahpenerima', compact('admins'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jumlah_pkh' => 'required|integer',
            'jumlah_bpnt' => 'required|integer',
            'jumlah_keluarga' => 'required|integer',
        ]);

        penerima::create($request->all());

        return redirect()->route('admin.penerima')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // EDIT FORM
    public function edit($id)
    {
        $admins = User::all();

        $penerima = penerima::findOrFail($id);
        return view('admin.editpenerima', compact('penerima','admins'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jumlah_pkh' => 'required|integer',
            'jumlah_bpnt' => 'required|integer',
            'jumlah_keluarga' => 'required|integer',
        ]);

        $penerima = penerima::findOrFail($id);
        $penerima->update($request->all());

        return redirect()->route('admin.penerima')
            ->with('success', 'Data berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $penerima = penerima::findOrFail($id);
        $penerima->delete();

        return redirect()->route('admin.penerima')
            ->with('success', 'Data berhasil dihapus');
    }
}
