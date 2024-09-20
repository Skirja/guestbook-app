<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerasi session untuk keamanan (session fixation prevention)
            $request->session()->regenerate();

            // Jika berhasil login, redirect ke dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // Jika gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput();
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidasi session saat logout
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Anda telah logout.');
    }
}
