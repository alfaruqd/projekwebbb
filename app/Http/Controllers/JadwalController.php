<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    // Menampilkan semua jadwal untuk pasien yang login
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin bisa lihat semua jadwal
            $jadwals = Jadwal::with(['satuJadwalKeDokter', 'satuJadwalkePasien'])->latest()->get();
        } else {
            // Pasien hanya bisa lihat miliknya
            $jadwals = Jadwal::with(['satuJadwalKeDokter', 'satuJadwalkePasien'])
                ->where('id_pasien', $user->pasien->id_pasien)
                ->latest()
                ->get();
        }

        return view('pages.jadwal.index', compact('jadwals'));
    }
}
