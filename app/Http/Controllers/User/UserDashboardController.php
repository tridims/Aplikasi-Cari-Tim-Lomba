<?php

namespace App\Http\Controllers\User;

use App\Models\Rekrutmen;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function profile() {
        $user = Auth::user();
        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function rekrutmen() {
        $user = Auth::user();
        $listRekrutmen = $user->rekrutmen;

        $listRequestRekrutmen = $user->requestRekrutmen;
        $listRequestRekrutmen->each(function($requestRekrutmen) {
            $requestRekrutmen->judul = $requestRekrutmen->rekrutmen->judul;
        });

        return view('user.rekrutmen', [
            'user' => $user,
            'listRekrutmen' => $listRekrutmen,
            'listRequestRekrutmen' => $listRequestRekrutmen
        ]);
    }

    public function pengumuman_rekrutmen(Rekrutmen $rekrutmen) {
        $daftar_user_request = $rekrutmen->requestRekrutmen;
        $lomba = $rekrutmen->lomba;

        return view('user.pengumuman_rekrutmen', [
            'rekrutmen' => $rekrutmen,
            'daftar_user_request' => $daftar_user_request,
            'lomba' => $lomba,
        ]);
    }
}
