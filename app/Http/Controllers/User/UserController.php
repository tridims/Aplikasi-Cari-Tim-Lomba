<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $user) {
        $profil = $user->profil;
        return view('user.public-profil', [
            'user' => $user,
            'profil' => $profil,
        ]);
    }
}
