<?php

namespace App\Http\Controllers\Rekrutmen;

use App\Http\Controllers\Controller;
use App\Models\RequestRekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestRekrutmenController extends Controller
{
    public function accept(RequestRekrutmen $requestRekrutmen)
    {
        // check if user is the author of the request
        if ($requestRekrutmen->rekrutmen->user->id != Auth::user()->id) {
            return redirect()->back();
        }

        $requestRekrutmen->update([
            'status' => 'accepted',
        ]);

        return redirect()->back();
    }

    public function reject(RequestRekrutmen $requestRekrutmen)
    {
        if ($requestRekrutmen->rekrutmen->user->id != Auth::user()->id) {
            return redirect()->back();
        }

        $requestRekrutmen->update([
            'status' => 'rejected',
        ]);

        return redirect()->back();
    }
}
