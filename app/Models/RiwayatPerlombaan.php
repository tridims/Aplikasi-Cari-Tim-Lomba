<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserProfile;

class RiwayatPerlombaan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(UserProfile::class, 'user_profile_id');
    }
}
