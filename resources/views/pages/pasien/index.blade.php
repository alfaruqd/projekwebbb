@extends('layouts.app')

@section('title', 'Tambah Pasien')
@section('page_title', 'Tambah Data Pasien')

@section('content')
<div class="container mt-4">
    <h1>Tambah Pasien</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul>
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
            <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" value="{{ old('nama_pasien') }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ old('no_telp') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Tambah Pasien</button>
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

