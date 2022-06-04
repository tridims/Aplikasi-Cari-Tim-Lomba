<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //TODO: implement hash function
        $formFieldsUserAccount = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $formFieldsUserProfile = $request->validate([
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

        $user = User::create($formFieldsUserAccount);

        if ($request->hasFile('foto')) {
            $formFieldsUserProfile['foto'] = $request->file('foto')->store('user/foto', 'public');
        }

        if ($request->hasFile('cv')) {
            $formFieldsUserProfile['cv'] = $request->file('cv')->store('user/cv', 'public');
        }

        $formFieldsUserProfile['user_id'] = $user->id;

        $userProfile = UserProfile::create($formFieldsUserProfile);
        $user->profile()->save($userProfile);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
