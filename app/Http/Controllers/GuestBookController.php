<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuTamu;

class GuestBookController extends Controller
{
    // Method untuk menampilkan halaman form buku tamu
    public function index()
    {
        return view('welcome');
    }

    // Method untuk menyimpan data tamu ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:15',
            'pesan' => 'required|string',
        ]);

        BukuTamu::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'telepon' => $request->input('telepon'),
            'pesan' => $request->input('pesan'),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih, data Anda telah tersimpan.');
    }
}
