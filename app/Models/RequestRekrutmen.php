<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestRekrutmen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rekrutmen_id',
        'status',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rekrutmen()
    {
        return $this->belongsTo(Rekrutmen::class, 'rekrutmen_id');
    }
}
