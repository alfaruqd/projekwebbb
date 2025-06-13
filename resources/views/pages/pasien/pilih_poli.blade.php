@extends('layouts.app')

@section('title', 'Pilih Poli')
@section('page_title', 'Pilih Poli')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Pilih Poli dan Tanggal</h4>
        </div>

        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('lanjut.jadwal') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_poli" class="form-label">Pilih Poli</label>
                    <select name="id_poli" class="form-select" required>
                        <option value="">-- Pilih Poli --</option>
                        @foreach($polis as $poli)
                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tanggal_konsultasi" class="form-label">Tanggal Konsultasi</label>
                    <input type="date" name="tanggal_konsultasi" class="form-control" required min="{{ date('Y-m-d') }}">
                </div>

                <button type="submit" class="btn btn-primary">Lanjut</button>
            </form>
        </div>
    </div>
</div>
@endsection
