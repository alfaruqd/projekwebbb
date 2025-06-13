@extends('layouts.app')

@section('title', 'Jadwal Konsultasi')
@section('page_title', 'Jadwal Konsultasi')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h4>Daftar Jadwal Konsultasi</h4>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dokter</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Keluhan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwals as $jadwal)
                        <tr>
                            <td>{{ $jadwal->id_jadwal }}</td>
                            <td>{{ $jadwal->satuJadwalKeDokter->nama_dokter ?? '-' }}</td>
                            <td>{{ $jadwal->tanggal_konsultasi }}</td>
                            <td>{{ $jadwal->jam_konsultasi }}</td>
                            <td>{{ $jadwal->status }}</td>
                            <td>{{ $jadwal->keluhan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
