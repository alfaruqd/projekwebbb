<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $primaryKey = 'id_jadwal';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_jadwal', 'id_pasien', 'id_dokter', 'tanggal_konsultas'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = 'JDW';

            // Get the highest existing number
            $latest = static::query()
                ->where('id_jadwal', 'like', $prefix . '-%')
                ->orderByRaw('LENGTH(id_jadwal) DESC, id_jadwal DESC')
                ->first();

            if ($latest) {
                // Extract the numeric part
                $number = (int) substr($latest->id_jadwal, strrpos($latest->id_jadwal, '-') + 1) + 1;
            } else {
                $number = 1;
            }

            $model->id_jadwal = $prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT);
        });
    }

    public function satuJadwalKeDokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function satuJadwalkePasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
}
