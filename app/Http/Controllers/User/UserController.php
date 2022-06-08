<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(User $user)
    {
        $profil = $user->profil;
        $is_logged_in_user = auth()->user()->id === $user->id;
        return view('user.public-profil', [
            'user' => $user,
            'profil' => $profil,
            'private' => $is_logged_in_user
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        $profil = $user->profil;
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
        $profil = $user->profil;

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
                'foto' => $request->file('foto')->store('user/foto', 'public')
            ]);
        }

        if ($request->hasFile('cv')) {
            $profil->update([
                'cv' => $request->file('cv')->store('user/cv', 'public')
            ]);
        }

        return redirect()->route('profile');
    }
}
