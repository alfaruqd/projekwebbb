@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="card card-outline card-primary shadow">
    <div class="card-header text-center">
        <a href="#" class="h1"><b>LOGIN</b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Silakan login untuk melanjutkan</p>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
    
            <div class="mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-success btn-block">Login</button>
            </div>
            
        </form>

        <p class="mt-3 text-center">
            Belum punya akun? <a href="{{ url('/register') }}">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection
