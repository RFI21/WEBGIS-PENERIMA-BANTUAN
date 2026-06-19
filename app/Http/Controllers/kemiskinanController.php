<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kemiskinan;
use App\Models\User;

class kemiskinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kemiskinans = Kemiskinan::orderBy('nama_kecamatan', 'asc')
    ->orderBy('desil', 'asc')
    ->paginate(10);
        $admins = User::all();
        return view('admin.kemiskinan', compact('kemiskinans', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = User::all();
        return view('admin.tambahkemiskinan', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
$request->validate([
    'nama_kecamatan' => 'required',
    'kelurahan' => 'required', // TAMBAHAN
    'desil' => 'required',
    'jumlah_keluarga' => 'required|integer',
    'jumlah_jiwa' => 'required|integer',
]);

kemiskinan::create([
    'nama_kecamatan' => $request->nama_kecamatan,
    'kelurahan' => $request->kelurahan, // TAMBAHAN
    'desil' => $request->desil,
    'jumlah_keluarga' => $request->jumlah_keluarga,
    'jumlah_jiwa' => $request->jumlah_jiwa,
]);

        return redirect()->route('admin.kemiskinan')
            ->with('success', 'Data kemiskinan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kemiskinan = kemiskinan::findOrFail($id);
        $admins = User::all();
        return view('admin.editkemiskinan', compact('kemiskinan','admins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    $kemiskinan = kemiskinan::findOrFail($id);

$request->validate([
    'nama_kecamatan' => 'required',
    'kelurahan' => 'required', // TAMBAHAN
    'desil' => 'required',
    'jumlah_keluarga' => 'required|integer',
    'jumlah_jiwa' => 'required|integer',
]);

$kemiskinan->update([
    'nama_kecamatan' => $request->nama_kecamatan,
    'kelurahan' => $request->kelurahan, // TAMBAHAN
    'desil' => $request->desil,
    'jumlah_keluarga' => $request->jumlah_keluarga,
    'jumlah_jiwa' => $request->jumlah_jiwa,
]);

 

    return redirect()->route('admin.kemiskinan')
        ->with('success', 'kemiskinan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kemiskinan = kemiskinan::findOrFail($id);
        $kemiskinan->delete();

        return redirect()->route('admin.kemiskinan')->with('success','kemiskinan berhasil dihapus');
    }
}
