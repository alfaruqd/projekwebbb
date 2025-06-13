@extends('layouts.app')

@section('title', 'Tambah Pasien')
@section('page_title', 'Tambah Pasien')
@section('breadcrumb', 'Tambah Pasien')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Pasien Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_pasien" class="form-label">Nama Pasien</label>
            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" maxlength="13" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
