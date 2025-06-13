@extends('layouts.app')

@section('title', 'Konfirmasi Jadwal')
@section('page_title', 'Konfirmasi Jadwal')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Konfirmasi Jadwal Konsultasi</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('simpan.jadwal') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Dokter yang Akan Menangani:</label>
                    <div class="card p-3">
                        <strong>Dr. {{ $dokter->nama_dokter }}</strong><br>
                        <span>{{ $dokter->spesialis }}</span>
                    </div>
                    <input type="hidden" name="id_dokter" value="{{ $dokter->id_dokter }}">
                </div>

                <input type="hidden" name="id_poli" value="{{ $id_poli }}">
                <input type="hidden" name="tanggal_konsultasi" value="{{ $tanggal_konsultasi }}">

                <div class="mb-3">
                    <label for="jam_konsultasi" class="form-label">Jam Konsultasi</label>
                    <input type="time" name="jam_konsultasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="keluhan" class="form-label">Keluhan</label>
                    <textarea name="keluhan" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan Jadwal</button>
            </form>
        </div>
    </div>
</div>
@endsection
