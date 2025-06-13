<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\PasienController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', fn () => view('login'))->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', fn () => view('register'))->name('register');
Route::post('/register', [UserController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Protected Routes (require login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', fn () => redirect('/dashboard'));
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Pasien (CRUD)
    Route::resource('pasien', PasienController::class);
    Route::get('pasien/{id}/delete', [PasienController::class, 'deleteConfirmation'])->name('pasien.deleteConfirmation');

    // Jadwal Konsultasi (tanpa JS)
    Route::get('/jadwal/pilih', [PasienController::class, 'pilihPoli'])->name('pilih.poli');
    Route::post('/jadwal/lanjut', [PasienController::class, 'lanjutJadwal'])->name('lanjut.jadwal');
    Route::post('/jadwal/simpan', [PasienController::class, 'simpanJadwal'])->name('simpan.jadwal');

    // Konsultasi (jika masih digunakan)
    Route::post('/konsultasi', [KonsultasiController::class, 'konsultasi']);
});

Route::get('/register', [PasienController::class, 'registerForm']);


/*
|--------------------------------------------------------------------------
| API Route (sudah tidak dipakai kalau tanpa JS)
|--------------------------------------------------------------------------
| Kalau kamu sudah tidak butuh JavaScript ambil dokter random,
| kamu boleh hapus ini bagian API:
*/
// Route::get('/api/random-dokter', function (Request $request) {
//     $dokter = \App\Models\Dokter::where('id_poli', $request->poli_id)->inRandomOrder()->first();
//     return response()->json($dokter);
// });
