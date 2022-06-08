<?php

namespace App\Http\Controllers\Lomba;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LombaController extends Controller
{
    public function daftar_lomba() {
        $lomba = Lomba::orderBy('created_at', 'desc')->paginate(10);
        return view('lomba.daftar_lomba', [
            'daftar_lomba' => $lomba
        ]);
    }

    public function detail_lomba(Lomba $lomba) {
        $rekrutmen = $lomba->rekrutmen()->orderBy('created_at', 'desc')->paginate(10);
        $rekrutmen->each(function($rekrutmen) {
            $rekrutmen->nama = $rekrutmen->user->nama;
            $rekrutmen->request_diterima = $rekrutmen->requestDiterima();
        });

        $isAuthor = Auth::check() && Auth::user()->id == $lomba->user_id;

        return view('lomba.detail_lomba', [
            'lomba' => $lomba,
            'daftar_rekrutmen' => $rekrutmen,
            'isAuthor' => $isAuthor
        ]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $formFields = $request->validate([
            'nama' => 'required|string|max:255',
            'deadline_pendaftaran' => 'required|date',
            'kategori' => 'required|string',
            'penyelenggara' => 'required|string',
            'tingkat' => 'required|string',
            'website' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('poster')) {
            $formFields['poster'] = $request->file('poster')->store('poster', 'public');
        }

        $formFields['user_id'] = $user->id;

        $lomba = $user->lomba()->create($formFields);

        return redirect()->route('detail_lomba', ['lomba' => $lomba]);
    }

    public function edit(Lomba $lomba) {
        // verify if user is the owner of the lomba
        if ($lomba->user_id != Auth::user()->id) {
            return redirect()->route('detail_lomba', ['lomba' => $lomba]);
        }

        return view('lomba.edit', [
            'lomba' => $lomba
        ]);
    }

    public function update(Lomba $lomba, Request $request) {
        $formFields = $request->validate([
            'nama' => 'required|string|max:255',
            'deadline_pendaftaran' => 'required|date',
            'kategori' => 'required|string',
            'penyelenggara' => 'required|string',
            'tingkat' => 'required|string',
            'website' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('poster')) {
            $formFields['poster'] = $request->file('poster')->store('poster', 'public');
        }

        Auth::user()->lomba()->where('id', $lomba->id)->update($formFields);
        return redirect()->route('detail_lomba', ['lomba' => $lomba]);
    }

    public function delete(Lomba $lomba) {
        $isAuthor = Auth::check() && Auth::user()->id == $lomba->user_id;
        if ($isAuthor) {
            $lomba->delete();
        }
        return redirect()->route('daftar_lomba');
    }
}
