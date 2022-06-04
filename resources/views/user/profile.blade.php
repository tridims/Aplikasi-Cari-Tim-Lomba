<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Nama -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Welcome ! You're logged in as {{$user->profile->nama}}!</h1>
                </div>

                <!-- NIM -->
                <div class="p-6 bg-white border-b border-gray-200">
                    NIM : {{$user->profile->nim}}
                </div>

                <!-- Email -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Email : {{$user->email}}
                </div>

                <!-- Jenis Kelamin -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Jenis Kelamin : {{$user->profile->jenis_kelamin}}
                </div>

                <!-- telepon -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Telepon : {{$user->profile->telepon}}
                </div>

                <!-- linkedin -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Linkedin : {{$user->profile->linkedin}}
                </div>

                <!-- angkatan -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Angkatan : {{$user->profile->angkatan}}
                </div>

                <!-- prodi -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Prodi : {{$user->profile->prodi}}
                </div>

                <!-- fakultas -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Fakultas : {{$user->profile->fakultas}}
                </div>

                <!-- deskripsi -->
                <div class="p-6 bg-white border-b border-gray-200">
                    Deskripsi : {{$user->profile->deskripsi}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
