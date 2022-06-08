<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Rekrutmen;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // get 4 latest lomba
        $lomba = Lomba::orderBy('created_at', 'desc')->take(4)->get();

        // get 4 latest rekrutmen
        $rekrutmen = Rekrutmen::orderBy('created_at', 'desc')->take(4)->get();

        return view('welcome', [
            'daftar_lomba' => $lomba,
            'daftar_rekrutmen' => $rekrutmen
        ]);
    }
}
