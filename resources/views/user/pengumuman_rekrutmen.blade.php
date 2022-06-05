<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Judul -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{$rekrutmen->judul}}</h1>
                </div>

                <!-- status -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <h4>Status : {{$rekrutmen->status}}</h4>
                </div>

                <!-- Judul -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Jumlah Anggota Dicari : {{$rekrutmen->jumlah}}</p>
                </div>

                <!-- deskripsi -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{$rekrutmen->deskripsi}}</p>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>DAFTAR USER REQUEST</h1>
                </div>
                <!-- daftar user yang request -->
                @unless(count($daftar_user_request) == 0)
                    @foreach($daftar_user_request as $daftar)
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h4>{{$daftar->user->profile->nama}}</h4>
                            <p>{{$daftar->status}}</p>
                            <br>
                        </div>
                    @endforeach
                @else
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Tidak ada user request</p>
                    </div>
                @endunless

            </div>
        </div>
    </div>
</x-app-layout>
