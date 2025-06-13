<!-- resources/views/bpjs.blade.php -->
@extends('adminlte::page') <!-- Jika Laravel + AdminLTE -->
@section('title', 'BPJS Kesehatan - Layanan Terpadu')

@section('content_header')
<h1>BPJS Kesehatan</h1>
@stop

@section('content')
<!-- User Info Section -->
<div class="bg-gradient bg-primary text-white p-4 rounded mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <i class="far fa-user-circle fa-3x me-3"></i>
            <div>
                <h5 class="mb-0">Ahmad Budiman</h5>
                <small>No. Peserta: 0001234567890</small>
            </div>
        </div>
        <span class="badge bg-success">Aktif</span>
    </div>
    <div class="mt-3 bg-white bg-opacity-25 p-3 rounded">
        <div class="d-flex justify-content-between">
            <span>Kelas Peserta</span>
            <strong>Kelas 1</strong>
        </div>
        <div class="d-flex justify-content-between">
            <span>Masa Berlaku</span>
            <strong>31 Desember 2025</strong>
        </div>
    </div>
</div>

<!-- Menu Grid -->
<div class="row">
    @php
    $menus = [
        ['icon' => 'fas fa-file-invoice', 'label' => 'Klaim'],
        ['icon' => 'fas fa-hospital-user', 'label' => 'Faskes'],
        ['icon' => 'fas fa-history', 'label' => 'Riwayat'],
        ['icon' => 'fas fa-credit-card', 'label' => 'Pembayaran'],
        ['icon' => 'fas fa-file-medical', 'label' => 'e-Klaim'],
        ['icon' => 'fas fa-calendar-check', 'label' => 'Janji Temu'],
        ['icon' => 'fas fa-info-circle', 'label' => 'Info'],
        ['icon' => 'fas fa-ellipsis-h', 'label' => 'Lainnya'],
    ];
    @endphp
    @foreach($menus as $menu)
    <div class="col-6 col-md-3 mb-3">
        <div class="card text-center h-100">
            <div class="card-body">
                <i class="{{ $menu['icon'] }} text-primary mb-2 fa-2x"></i>
                <p class="card-text">{{ $menu['label'] }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Status Pembayaran -->
<div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <strong>Status Pembayaran</strong>
        <a href="#" class="text-primary small">Lihat Detail</a>
    </div>
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <p class="mb-1">Tagihan Terakhir</p>
            <h5>Rp 150.000</h5>
            <small>Jatuh tempo: 10 Juli 2023</small>
        </div>
        <span class="badge bg-primary py-2 px-3">LUNAS</span>
    </div>
</div>

<!-- Info Kesehatan -->
<div class="card mb-3">
    <div class="card-header bg-primary text-white">
        Info Kesehatan
    </div>
    <div class="card-body">
        <div class="mb-3">
            <i class="fas fa-syringe text-primary me-2"></i>
            <strong>Vaksinasi Booster</strong>
            <p class="mb-0">Jadwal vaksinasi booster Anda tersedia</p>
            <small class="text-muted">2 jam yang lalu</small>
        </div>
        <div>
            <i class="fas fa-heartbeat text-danger me-2"></i>
            <strong>Cek Kesehatan Berkala</strong>
            <p class="mb-0">Jadwalkan cek kesehatan rutin Anda</p>
            <small class="text-muted">Kemarin</small>
        </div>
    </div>
</div>

<!-- Fasilitas Terdekat -->
<div class="card mb-3">
    <div class="card-header d-flex justify-content-between">
        <strong>Fasilitas Kesehatan Terdekat</strong>
        <a href="#" class="text-primary small">Lihat Semua</a>
    </div>
    <div class="card-body">
        <div class="mb-3 d-flex">
            <div class="bg-light rounded me-3" style="width:64px; height:64px;"></div>
            <div>
                <strong>RS Umum Daerah Kota</strong>
                <p class="mb-1"><i class="fas fa-map-marker-alt text-primary me-1"></i>1.2 km</p>
                <span class="badge bg-success me-2">Buka</span>
                <small class="text-muted">24 Jam</small>
            </div>
        </div>
        <div class="d-flex">
            <div class="bg-light rounded me-3" style="width:64px; height:64px;"></div>
            <div>
                <strong>Klinik Sehat Sentosa</strong>
                <p class="mb-1"><i class="fas fa-map-marker-alt text-primary me-1"></i>0.8 km</p>
                <span class="badge bg-success me-2">Buka</span>
                <small class="text-muted">08.00 - 21.00</small>
            </div>
        </div>
    </div>
</div>

<!-- Emergency Section -->
<div class="card bg-danger text-white mb-3">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <h5>Darurat?</h5>
            <p class="mb-0">Layanan gawat darurat 24 jam</p>
        </div>
        <button class="btn btn-light text-danger">
            <i class="fas fa-phone-alt me-2"></i>PANGGIL
        </button>
    </div>
</div>
@stop
