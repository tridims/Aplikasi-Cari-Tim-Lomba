<?php

namespace App\Http\Controllers\Rekrutmen;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use App\Models\Rekrutmen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekrutmenController extends Controller
{
    // list paginated rekrutmen sorted by the latest created
    public function daftar_rekrutmen() {
        $rekrutmen = Rekrutmen::orderBy('created_at', 'desc')->paginate(10);

        $rekrutmen->each(function($rekrutmen) {
            $rekrutmen->lomba = $rekrutmen->lomba;
            $rekrutmen->user = $rekrutmen->user;
            $rekrutmen->request_diterima = $rekrutmen->requestDiterima;
        });

        return view('rekrutmen.daftar_rekrutmen', [
            'listRekrutmen' => $rekrutmen
        ]);
    }

    // detail rekrutmen
    public function detail_rekrutmen(Rekrutmen $rekrutmen) {
        $daftar_user_request = $rekrutmen->requestRekrutmen;
        $lomba = $rekrutmen->lomba;
        $daftarAnggota = $rekrutmen->requestDiterima;

        $daftarAnggota->each(function ($anggota) {
            $anggota->user = $anggota->user;
            $anggota->profile = $anggota->user->profile;
        });

        return view('rekrutmen.detail_rekrutmen', [
            'rekrutmen' => $rekrutmen,
            'daftar_request' => $daftar_user_request,
            'lomba' => $lomba,
            'daftarAnggota' => $daftarAnggota
        ]);
    }

    // show the form to create a new rekrutmen
    public function add(Lomba $lomba) {
        return view('rekrutmen.add', [
            'lomba' => $lomba
        ]);
    }

    // store the new rekrutmen
    public function store(Request $request, Lomba $lomba) {
        $user = auth()->user();
        $formFields = $request->validate([
            'judul' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
        ]);

        $rekrutmen = $lomba->rekrutmen()->create([
            'user_id' => $user->id,
            'lomba_id' => $lomba->id,
            'judul' => $formFields['judul'],
            'jumlah' => $formFields['jumlah'],
            'deskripsi' => $formFields['deskripsi'],
        ]);

        return redirect()->route('detail_rekrutmen_user', ['rekrutmen' => $rekrutmen]);
    }

    // show edit forms
    public function edit(Rekrutmen $rekrutmen) {
        return view('rekrutmen.edit', [
            'rekrutmen' => $rekrutmen
        ]);
    }

    // update the rekrutmen
    public function update(Request $request, Rekrutmen $rekrutmen) {
        $formFields = $request->validate([
            'judul' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
        ]);

        $idRekrutmen = $rekrutmen->id;
        Auth::user()->rekrutmen()->find($idRekrutmen)->update($formFields);

        return redirect()->route('detail_rekrutmen_user', ['rekrutmen' => $rekrutmen]);
    }

    // delete rekrutmen
    public function delete(Rekrutmen $rekrutmen) {
        $rekrutmen->delete();
        return redirect()->route('rekrutmen');
    }

    // stop rekrutmen
    public function stop(Rekrutmen $rekrutmen) {
        $rekrutmen->update([
            'status' => 'stop'
        ]);
        return redirect()->route('detail_rekrutmen_user', ['rekrutmen' => $rekrutmen]);
    }

    public function createRequest(Rekrutmen $rekrutmen) {
        $user = auth()->user();
        $rekrutmen->requestRekrutmen()->create([
            'user_id' => $user->id,
            'rekrutmen_id' => $rekrutmen->id
        ]);

        return redirect()->route('rekrutmen');
    }
}
