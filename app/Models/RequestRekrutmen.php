<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestRekrutmen extends Model
{
    use HasFactory;

    public function rekrutmen()
    {
        return $this->belongsTo(Rekrutmen::class, 'rekrutmen_id');
    }
}
