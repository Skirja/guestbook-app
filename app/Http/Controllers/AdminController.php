<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dashboard()
    {
        $guests = BukuTamu::all();
        return view('admin.dashboard', compact('guests'));
    }

    public function filterByDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Jika ada filter tanggal
        if ($startDate && $endDate) {
            $guests = BukuTamu::whereBetween('created_at', [Carbon::parse($startDate)->startOfDay(), Carbon::parse($endDate)->endOfDay()])->get();
        } else {
            // Jika tidak ada filter, ambil semua data
            $guests = BukuTamu::all();
        }

        return view('admin.dashboard', compact('guests', 'startDate', 'endDate'));
    }

    // Ekspor data ke PDF
    public function exportPDF(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Jika ada filter tanggal, ambil data berdasarkan filter
        if ($startDate && $endDate) {
            $guests = BukuTamu::whereBetween('created_at', [Carbon::parse($startDate)->startOfDay(), Carbon::parse($endDate)->endOfDay()])->get();
        } else {
            // Jika tidak ada filter, ambil semua data
            $guests = BukuTamu::all();
        }

        // Load view untuk PDF
        $pdf = PDF::loadView('admin.pdf_export', compact('guests', 'startDate', 'endDate'));

        // Download file PDF
        return $pdf->download('buku_tamu.pdf');
    }

    public function edit($id)
    {
        $guest = BukuTamu::find($id);
        return view('admin.edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        $guest = BukuTamu::find($id);
        $guest->nama = $request->nama;
        $guest->email = $request->email;
        $guest->pesan = $request->pesan;
        $guest->save();
        return redirect()->route('admin.dashboard');
    }

    public function destroy($id)
    {
        $guest = BukuTamu::find($id);
        $guest->delete();
        return redirect()->route('admin.dashboard');
    }
}
