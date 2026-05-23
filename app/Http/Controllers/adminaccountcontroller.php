<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class adminaccountcontroller extends Controller
{
    //
       //tambah admin
public function tambahadmin()
       {
        $admins = User::all(); 
           return view('admin.tambahadmin', compact('admins'));
       }
       
public function simpanadmin(Request $request)
   {
       // Validasi dan simpan
       $request->validate([
           'nama' => 'required|string|max:255',
           'username' => 'required|string|max:255|unique:admins',
           'password' => 'required',
       ]);
   
       User::create([
           'nama' => $request->nama,
           'username' => $request->username,
           'password' => Hash::make($request->password), // Enkripsi password
       ]);
   
       return redirect()->route('admin.admin')->with('success', 'Admin berhasil ditambahkan');
   
   }


//    edit admin
   // Menampilkan form edit admin
   public function editadmin($id)
   {
       $admin = User::findOrFail($id); // Ambil data admin berdasarkan ID
       $admins = User::all(); // Untuk tampilan dropdown user saat login (opsional)

       return view('admin.editadmin', compact('admin', 'admins'));
   }

   // Menyimpan hasil edit admin
   public function update(Request $request, $id)
   {
       $request->validate([
           'nama' => 'required|string|max:255',
           'username' => 'required|string|max:255',
           'password' => 'nullable|string',
       ]);

       $admin = User::findOrFail($id);
       $admin->nama = $request->nama;
       $admin->username = $request->username;

       if (!empty($request->password)) {
           $admin->password = Hash::make($request->password); // Enkripsi password
       }

       $admin->save();

       return redirect()->route('admin.admin')->with('success', 'Data admin berhasil diperbarui.');
   }

}
