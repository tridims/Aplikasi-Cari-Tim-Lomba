<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekrutmen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lomba_id',
        'judul',
        'jumlah',
        'deskripsi',
        'status',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'user_id');
    }

    public function lomba(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Lomba::class, 'lomba_id');
    }

    public function requestRekrutmen(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RequestRekrutmen::class);
    }

    public function requestDiterima(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RequestRekrutmen::class)->where('status', 'accepted');
    }
}
