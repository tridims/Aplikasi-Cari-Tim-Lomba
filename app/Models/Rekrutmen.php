<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekrutmen extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(UserProfile::class, 'user_profile_id');
    }

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'lomba_id');
    }

    public function request_rekrutmen()
    {
        return $this->hasMany(RequestRekrutmen::class);
    }
}