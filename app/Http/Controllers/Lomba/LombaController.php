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
            'lomba' => $lomba
        ]);
    }

    public function detail_lomba(Lomba $lomba) {
        return view('lomba.detail_lomba', [
            'lomba' => $lomba
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
        Auth::user()->lomba()->where('id', $lomba->id)->delete();
        return redirect()->route('daftar_lomba');
    }
}
