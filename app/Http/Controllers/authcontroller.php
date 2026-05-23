<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('admin.login'); // pastikan ini file login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Asumsikan user menggunakan kolom 'username' di tabel users
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin'); // redirect ke halaman admin
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
