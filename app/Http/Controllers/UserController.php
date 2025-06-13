<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Fungsi Register User Baru
    public function register(Request $request)
{
    // Validasi data input
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required', 'string', 'min:8', 'max:20']
    ]);

    // Enkripsi password sebelum disimpan
    $validated['password'] = bcrypt($validated['password']);

    // Simpan user ke database
    $user = User::create($validated);

    // Login otomatis setelah registrasi
    Auth::login($user);

    // Redirect ke halaman utama dengan pesan sukses
    return redirect('/')->with('success', 'Registrasi berhasil dan langsung login.');
}
    // Fungsi Login
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (auth()->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
}

    // Fungsi Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }

    public function pasien()
{
    return $this->hasOne(Pasien::class);
}

public function showRegister()
{
    return view('auth.register'); // atau sesuai path view kamu
}   
}
