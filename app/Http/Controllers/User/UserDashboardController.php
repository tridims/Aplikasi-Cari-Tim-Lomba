<?php

namespace App\Http\Controllers\User;

use App\Models\Rekrutmen;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $profil = $user->profile;
        $riwayat = $profil->riwayat_lomba;

        return view('user.profile', [
            'user' => $user,
            'profil' => $profil,
            'prestasi' => $riwayat,
            'private' => true,
        ]);
    }

    public function rekrutmen()
    {
        $user = Auth::user();
        $listRekrutmen = $user->rekrutmen;

        $listRekrutmen->each(function ($rekrutmen) {
            $rekrutmen->lomba = $rekrutmen->lomba;
            $rekrutmen->request_diterima = $rekrutmen->requestDiterima();
        });

        $listRequestRekrutmen = $user->requestRekrutmen;
        $listRequestRekrutmen->each(function ($requestRekrutmen) {
            $requestRekrutmen->judul = $requestRekrutmen->rekrutmen->judul;
            $requestRekrutmen->idRekrutmen = $requestRekrutmen->rekrutmen->id;
            $requestRekrutmen->idLomba = $requestRekrutmen->rekrutmen->lomba->id;
            $requestRekrutmen->lomba = $requestRekrutmen->rekrutmen->lomba;
        });

        return view('user.rekrutmen', [
            'user' => $user,
            'listRekrutmen' => $listRekrutmen,

            'listRequestRekrutmen' => $listRequestRekrutmen
        ]);
    }

    public function pengumuman_rekrutmen(Rekrutmen $rekrutmen)
    {
        $daftar_request = $rekrutmen->requestRekrutmen;
        $lomba = $rekrutmen->lomba;
        $daftarAnggota = $rekrutmen->requestDiterima;

        $daftarAnggota->each(function ($anggota) {
            $anggota->user = $anggota->user;
            $anggota->profile = $anggota->user->profile;
        });

        return view('user.pengumuman_rekrutmen', [
            'rekrutmen' => $rekrutmen,
            'daftarAnggota' => $daftarAnggota,
            'daftar_request' => $daftar_request,
            'lomba' => $lomba,
        ]);
    }
}
