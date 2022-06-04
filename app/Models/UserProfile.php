<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nim',
        'jenis_kelamin',
        'telepon',
        'linkedin',
        'angkatan',
        'prodi',
        'fakultas',
        'deskripsi',
        'foto',
        'cv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function riwayat_lomba()
    {
        return $this->hasMany(RiwayatPerlombaan::class);
    }
}
