<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
        'foto',
        'whatsapp',
        'email',
        'tanggal_lahir',
        'gender',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * URL foto profil (null kalau belum upload foto).
     */
    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? \Illuminate\Support\Facades\Storage::url($this->foto) : null;
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'tanggal_lahir' => 'date',
        ];
    }

    public function keranjangs(): HasMany
    {
        return $this->hasMany(Keranjang::class, 'user_id');
    }

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'user_id');
    }

    public function notifikasis(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'user_id');
    }
}
