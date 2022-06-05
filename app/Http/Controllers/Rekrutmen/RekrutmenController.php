<?php

namespace App\Http\Controllers\Rekrutmen;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use App\Models\Rekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekrutmenController extends Controller
{
    // list paginated rekrutmen sorted by the latest created
    public function daftar_rekrutmen() {
        $rekrutmen = Rekrutmen::orderBy('created_at', 'desc')->paginate(10);
        return view('rekrutmen.daftar_rekrutmen', [
            'rekrutmen' => $rekrutmen
        ]);
    }

    // detail rekrutmen
    public function detail_rekrutmen(Rekrutmen $rekrutmen) {
        $daftar_user_request = $rekrutmen->requestRekrutmen;
        $lomba = $rekrutmen->lomba;
        return view('rekrutmen.detail_rekrutmen', [
            'rekrutmen' => $rekrutmen,
            'daftar_user_request' => $daftar_user_request,
            'lomba' => $lomba,
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
        $user = Auth::user();
        $formFields = $request->validate([
            'judul' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
        ]);

        $formFields['user_id'] = $user->id;
        $formFields['lomba_id'] = $lomba->id;

        $rekrutmen = $lomba->rekrutmen()->create($formFields);

        return redirect()->route('detail_rekrutmen_user', ['rekrutmen' => $rekrutmen]);
    }

    // show edit forms
    public function edit(Rekrutmen $rekrutmen) {
        return view('rekrutmen.edit', [
            'rekrutmen' => $rekrutmen
        ]);
    }

    public function update(Request $request, Rekrutmen $rekrutmen) {
        $formFields = $request->validate([
            'judul' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
        ]);

        $idRekrutmen = $rekrutmen->id;
        Auth::user()->rekrutmen()->updateExistingPivot($idRekrutmen, $formFields);

        return redirect()->route('detail_rekrutmen_user', ['rekrutmen' => $rekrutmen]);
    }

    // delete rekrutmen
    public function delete(Rekrutmen $rekrutmen) {
        $rekrutmen->delete();
        return redirect()->route('rekrutmen');
    }
}
