<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';
    protected $primaryKey = 'id_dokters';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_dokter', 'id_poli', 'nama_dokter', 'jenis_kelamin_dokter', 'bidang_keahlian', 'no_telp_dokter'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $latest = static::latest()->first(); // Ambil data terakhir
            $prefix = 'DKT'; // Prefix untuk menetukan isian awal
            
            if ($latest) {
                $number = (int) substr($latest->id_dokter, -5) + 1; // Tetap ambil 3 digit terakhir
            } else {
                $number = 1;
            }

            $model->id_dokter = $prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT); // Format: ABCDE-001
        });
    }

    public function kePoli(): BelongsTo
    {
        return $this->belongsTo(Poli::class, 'id_pasien', 'id_pasien');
    }

    public function keJadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_dokter', 'id_dokter');
    }

    public function keKonsultasi(): HasMany
    {
        return $this->hasMany(Konsultasi::class, 'id_dokter', 'id_dokter');
    }
}
