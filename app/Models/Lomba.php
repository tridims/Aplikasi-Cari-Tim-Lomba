<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deadline_pendaftaran',
        'poster',
        'kategori',
        'penyelenggara',
        'tingkat',
        'website',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rekrutmen() {
        return $this->hasMany(Rekrutmen::class);
    }
}
