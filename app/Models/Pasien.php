<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';
    protected $primaryKey = 'id_pasien';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pasien', 'user_id', 'nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'no_telp', 'alamat'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latest = static::latest()->first(); // Ambil data terakhir
            $prefix = 'PSN'; // Prefix untuk menetukan isian awal
            
            if ($latest) {
                $number = (int) substr($latest->id_pasien, -5) + 1; // Tetap ambil 3 digit terakhir
            } else {
                $number = 1;
            }

            $model->id_pasien = $prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT); // Format: ABCDE-001
        });
    }

    public function keJadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_pasien', 'id_pasien');
    }

    public function keKonsultasi(): HasMany
    {
        return $this->hasMany(Konsultasi::class, 'id_pasien', 'id_pasien');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
