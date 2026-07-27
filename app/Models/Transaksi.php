<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'nama_pembeli',
        'nomor_hp',
        'alamat_pengiriman',
        'total_harga',
        'status',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function notifikasis(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'transaksi_id');
    }
}
