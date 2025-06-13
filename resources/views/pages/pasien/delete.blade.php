@extends('layouts.app')

@section('title', 'Hapus Pasien')
@section('page_title', 'Konfirmasi Hapus Pasien')

@section('content')
<div class="container">
    <h1>Hapus Data Pasien</h1>

    <div class="alert alert-danger">
        Apakah Anda yakin ingin menghapus pasien <strong>{{ $pasien->nama_pasien }}</strong>?
    </div>

    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
</div>
@endsection
