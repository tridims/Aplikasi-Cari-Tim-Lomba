<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function profile() {
        return "profile";
    }

    public function rekrutmen() {
        return "rekrutmen";
    }

    public function detail_rekrutmen($id) {
        return "detail_rekrutmen dengan id $id";
    }
}
