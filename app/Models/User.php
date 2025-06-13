<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        // 'is_dokter'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Gunakan nama konvensional 'pasien'
    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'user_id');
    }

    public function keKonsultasi(): HasMany
    {
        return $this->hasMany(Konsultasi::class, 'user_id');
    }
}
