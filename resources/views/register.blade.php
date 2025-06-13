@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="card card-outline card-primary shadow">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>Register</b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Daftarkan akun Anda</p>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-block">Register</button>
            </div>
        </form>

        <p class="mt-3 text-center">
            Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a>
        </p>
    </div>
</div>
@endsection
