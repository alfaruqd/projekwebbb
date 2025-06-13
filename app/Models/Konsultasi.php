<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasis';
    protected $primaryKey = 'id_konsultasi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_konsultasi',
        'id_dokter',
        'user_id',
        'pertanyaan',
        'jawaban',
    ];

    // Generate ID Otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = 'KON';

            // Get the highest existing number
            $latest = static::query()
                ->where('id_konsultasi', 'like', $prefix . '-%')
                ->orderByRaw('LENGTH(id_konsultasi) DESC, id_konsultasi DESC')
                ->first();

            if ($latest) {
                // Extract the numeric part
                $number = (int) substr($latest->id_poli, strrpos($latest->id_poli, '-') + 1) + 1;
            } else {
                $number = 1;
            }

            $model->id_konsultasi = $prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT);
        });
    }

    // Relasi ke Dokter
    public function dokter(): BelongsTo
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    // Relasi ke User (Pasien)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}