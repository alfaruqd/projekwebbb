<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function konsultasi(Request $request)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'nullable|string'
        ]);

        $data['pertanyaan'] = strip_tags($data['pertanyaan']);
        $data['jawaban'] = strip_tags($data['jawaban'] ?? '');
        $data['user_id'] = auth()->user()->id;

        Konsultasi::create($data);

        return redirect('/')->with('success', 'Konsultasi berhasil disimpan.');
    }

    public function jadwal(Request $request)
    {
        $request->validate([
            'poli_id' => 'required|exists:polis,id'
        ]);

        $jadwals = Jadwal::with('dokter')
            ->whereHas('dokter', function ($query) use ($request) {
                $query->where('poli_id', $request->poli_id);
            })
            ->get();

        return view('pages.konsultasi.pilih_jadwal', compact('jadwals'));
    }
}
