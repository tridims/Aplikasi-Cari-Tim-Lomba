<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function profile(User $user)
    {
        $profil = $user->profile;
        $prestasi = $profil->riwayat_lomba;
        $is_logged_in_user = auth()->user()->id === $user->id;
        if (!isNull($profil->foto)) {
            $foto = $profil->foto;
        } else {
            $foto = null;
        }

        if ($is_logged_in_user) {
            return redirect()->route('profile');
        }

        return view('user.profile', [
            'foto' => $foto,
            'user' => $user,
            'profil' => $profil,
            'prestasi' => $prestasi,
            'private' => false,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $profil = $user->profile;
        $is_logged_in_user = auth()->user()->id === $user->id;
        return view('user.edit', [
            'user' => $user,
            'profil' => $profil,
            'private' => $is_logged_in_user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profil = $user->profile;

        $formFieldsUserProfile = $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'linkedin' => ['required', 'string', 'max:255'],
            'angkatan' => ['required', 'integer'],
            'prodi' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
        ]);

        $profil->update($formFieldsUserProfile);

        if ($request->hasFile('foto')) {
            $profil->update([
                'foto' => $request->file('foto')->store('foto', 'public')
            ]);
        }

        if ($request->hasFile('cv')) {
            $profil->update([
                'cv' => $request->file('cv')->store('cv', 'public')
            ]);
        }

        return redirect()->route('profile');
    }

    public function addPrestasi() {
        return view('user.add-prestasi');
    }

    public function storePrestasi(Request $request) {
        $user = Auth::user();
        $profil = $user->profile;

        $formFieldsPrestasi = $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'tingkat' => ['required', 'string', 'max:255'],
            'penyelenggara' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'integer'],
            'peringkat' => ['required', 'string', 'max:255'],
        ]);

        if ($request->hasFile('sertifikat')) {
            $formFieldsPrestasi['sertifikat'] = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        $profil->riwayat_lomba()->create($formFieldsPrestasi);

        return redirect()->route('profile');
    }
}
