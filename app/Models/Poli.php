<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory;
    protected $table = 'polis';
    protected $primaryKey = 'id_poli';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_poli', 'nama_poli', 'deskripsi'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $prefix = 'POL';

            // Get the highest existing number
            $latest = static::query()
                ->where('id_poli', 'like', $prefix . '-%')
                ->orderByRaw('LENGTH(id_poli) DESC, id_poli DESC')
                ->first();

            if ($latest) {
                // Extract the numeric part
                $number = (int) substr($latest->id_poli, strrpos($latest->id_poli, '-') + 1) + 1;
            } else {
                $number = 1;
            }

            $model->id_poli = $prefix . '-' . str_pad($number, 5, '0', STR_PAD_LEFT);
        });
    }

    public function keDokter(): HasMany
    {
        return $this->hasMany(Dokter::class, 'id_dokter', 'id_dokter');
    }
}
