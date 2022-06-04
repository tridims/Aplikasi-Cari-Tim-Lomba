<?php

namespace App\Http\Controllers\User;

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
        return "rekrutmen";
    }

    public function detail_rekrutmen($id) {
        return "detail_rekrutmen dengan id $id";
    }
}
