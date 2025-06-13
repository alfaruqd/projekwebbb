<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Poli;
use App\Models\Jadwal;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pages.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pages.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required|string|max:13',
            'alamat' => 'nullable|string',
        ]);

        $user = auth()->user();
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if ($user->pasien) {
            return back()->with('error', 'Anda sudah terdaftar sebagai pasien');
        }

        try {
            $user->pasien()->create($request->only([
                'nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'no_telp', 'alamat'
            ]));

            return redirect()->route('pilih.poli')->with('success', 'Data pasien berhasil ditambahkan, silakan pilih poli.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Pasien $pasien)
    {
        return view('pages.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required|string|max:13',
            'alamat' => 'nullable|string',
        ]);

        $pasien->update($request->only([
            'nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'no_telp', 'alamat'
        ]));

        return redirect('/pasien')->with('success', 'Data pasien berhasil diperbarui');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect('/pasien')->with('success', 'Berhasil menghapus data');
    }

    public function deleteConfirmation(Pasien $pasien)
    {
        return view('pages.pasien.delete', compact('pasien'));
    }

    public function pilihPoli()
    {
        $polis = Poli::all();
        return view('pages.pasien.pilih_poli', compact('polis'));
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

public function lanjutJadwal(Request $request)
{
    $validated = $request->validate([
        'id_poli' => 'required|exists:polis,id',
        'tanggal_konsultasi' => 'required|date|after_or_equal:today',
    ]);

    $dokter = Dokter::where('id_poli', $validated['id_poli'])->inRandomOrder()->first();

    if (!$dokter) {
        return redirect()->back()->with('error', 'Tidak ada dokter tersedia untuk poli ini.');
    }

    return view('pages.pasien.konfirmasi_jadwal', [
        'dokter' => $dokter,
        'id_poli' => $validated['id_poli'],
        'tanggal_konsultasi' => $validated['tanggal_konsultasi']
    ]);
}

public function simpanJadwal(Request $request)
{
    $validated = $request->validate([
        'id_poli' => 'required|exists:polis,id',
        'id_dokter' => 'required|exists:dokters,id_dokter',
        'tanggal_konsultasi' => 'required|date|after_or_equal:today',
        'jam_konsultasi' => 'required',
        'keluhan' => 'nullable|string|max:500'
    ]);

    $idPasien = auth()->user()->pasien->id_pasien;

    // ✅ Cek apakah pasien sudah punya jadwal di tanggal yang sama
    $sudahAda = Jadwal::where('id_pasien', $idPasien)
        ->where('tanggal_konsultasi', $validated['tanggal_konsultasi'])
        ->exists();

    if ($sudahAda) {
        return back()->with('error', 'Anda sudah memiliki jadwal konsultasi pada tanggal tersebut.');
    }

    // ✅ Simpan jika belum ada
    Jadwal::create([
        'id_pasien' => $idPasien,
        'id_dokter' => $validated['id_dokter'],
        'id_poli' => $validated['id_poli'],
        'tanggal_konsultasi' => $validated['tanggal_konsultasi'],
        'jam_konsultasi' => $validated['jam_konsultasi'],
        'keluhan' => $validated['keluhan'] ?? null,
    ]);

    return redirect()->route('jadwal.index')->with('success', 'Jadwal konsultasi berhasil dibuat.');
}


}