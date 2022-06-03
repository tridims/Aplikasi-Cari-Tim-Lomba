<?php

namespace App\Http\Controllers\Rekrutmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekrutmenController extends Controller
{
    public function daftar_rekrutmen() {
        return "daftar rekrutmen";
    }

    public function add($idLomba) {
        return "add rekrutmen dengan id lomba $idLomba";
    }

    public function store(Request $request) {
        return "store rekrutmen";
    }

    public function edit($id) {
        return "edit rekrutmen dengan id $id";
    }

    public function update(Request $request) {
        return "update rekrutmen";
    }

    public function delete($id) {
        return "delete rekrutmen dengan id $id";
    }
}
