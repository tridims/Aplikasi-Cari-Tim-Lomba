<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Username')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Nama -->
            <div class="mt-4">
                <x-label for="nama" :value="__('Nama')" />

                <x-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required />
            </div>

            <!-- NIM -->
            <div class="mt-4">
                <x-label for="nim" :value="__('NIM')" />

                <x-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required />
            </div>

            <!-- Jenis Kelamin -->
            <div class="mt-4">
                <x-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />

                <x-input id="jenis_kelamin" class="block mt-1 w-full" type="text" name="jenis_kelamin" :value="old('jenis_kelamin')" required />
            </div>

            <!-- Telepon -->
            <div class="mt-4">
                <x-label for="telepon" :value="__('Telepon')" />

                <x-input id="telepon" class="block mt-1 w-full" type="text" name="telepon" :value="old('telepon')" required />
            </div>

            <!-- Linkedin -->
            <div class="mt-4">
                <x-label for="linkedin" :value="__('Linkedin')" />

                <x-input id="linkedin" class="block mt-1 w-full" type="text" name="linkedin" :value="old('linkedin')" required />
            </div>

            <!-- angkatan -->
            <div class="mt-4">
                <x-label for="angkatan" :value="__('Angkatan')" />

                <x-input id="angkatan" class="block mt-1 w-full" type="text" name="angkatan" :value="old('angkatan')" required />
            </div>

            <!-- prodi -->
            <div class="mt-4">
                <x-label for="prodi" :value="__('Program Studi')" />

                <x-input id="prodi" class="block mt-1 w-full" type="text" name="prodi" :value="old('prodi')" required />
            </div>

            <!-- fakultas -->
            <div class="mt-4">
                <x-label for="fakultas" :value="__('Fakultas')" />

                <x-input id="fakultas" class="block mt-1 w-full" type="text" name="fakultas" :value="old('fakultas')" required />
            </div>

            <!-- Deskripsi -->
            <div class="mt-4">
                <x-label for="deskripsi" :value="__('Deskripsi')" />

                <x-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="old('deskripsi')" required />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
