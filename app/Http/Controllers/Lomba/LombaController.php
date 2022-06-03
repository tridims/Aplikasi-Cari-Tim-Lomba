<?php

namespace App\Http\Controllers\Lomba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    //TODO:implement function

    public function daftar_lomba() {
        //TODO: add pagination
        return "daftar lomba";
    }

    public function detail_lomba($id) {
        //TODO: use model to get data
        return "detail lomba dengan id $id";
    }

    public function store(Request $request) {
        //TODO: use model to store data and redirect to daftar_lomba and also make new request
        return "store lomba";
    }

    public function edit($id) {
        return "edit lomba dengan id $id";
    }

    public function update(Request $request) {
        return "update lomba";
    }

    public function delete($id) {
        return "delete lomba dengan id $id";
    }
}
