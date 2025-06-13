<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    // Tampilkan semua poli
    public function index()
    {
        $polis = Poli::all();
        return view('pages.poli.index', compact('polis'));
    }

    // Tampilkan form tambah poli
    public function create()
    {
        return view('pages.poli.create');
    }

    // Simpan data poli
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|unique:polis,id',
            'nama_poli' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Poli::create($request->only(['id', 'nama_poli', 'deskripsi']));

        return redirect()->route('polis.index')->with('success', 'Data poli berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Poli $poli)
    {
        return view('pages.poli.edit', compact('poli'));
    }

    // Update poli
    public function update(Request $request, Poli $poli)
    {
        $request->validate([
            'nama_poli' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $poli->update($request->only(['nama_poli', 'deskripsi']));

        return redirect()->route('polis.index')->with('success', 'Data poli berhasil diperbarui.');
    }

    // Hapus poli
    public function destroy(Poli $poli)
    {
        $poli->delete();
        return redirect()->route('polis.index')->with('success', 'Data poli berhasil dihapus.');
    }
}
