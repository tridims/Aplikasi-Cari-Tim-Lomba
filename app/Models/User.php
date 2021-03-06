<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's profile.
     *
     * @return HasOne<UserProfile>
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    public function rekrutmen(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rekrutmen::class, 'user_id');
    }

    public function requestRekrutmen(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RequestRekrutmen::class, 'user_id');
    }

    public function lomba(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Lomba::class, 'user_id');
    }
}
