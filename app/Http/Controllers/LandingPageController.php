<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Rekrutmen;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'lomba' => Lomba::latest()->paginate(10),
            'rekrutmen' => Rekrutmen::latest()->paginate(10),
        ]);
    }
}
