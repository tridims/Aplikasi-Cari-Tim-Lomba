<?php

namespace App\Http\Controllers\Rekrutmen;

use App\Http\Controllers\Controller;
use App\Models\RequestRekrutmen;
use Illuminate\Http\Request;

class RequestRekrutmenController extends Controller
{
    public function accept(RequestRekrutmen $requestRekrutmen)
    {
        $requestRekrutmen->update([
            'status' => 'diterima',
        ]);

        return redirect()->back();
    }

    public function reject(RequestRekrutmen $requestRekrutmen)
    {
        $requestRekrutmen->update([
            'status' => 'ditolak',
        ]);

        return redirect()->back();
    }
}
