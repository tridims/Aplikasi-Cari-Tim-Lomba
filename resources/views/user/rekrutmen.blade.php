<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Rekrutmen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Nama -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Welcome ! You're logged in as {{$user->profile->nama}}!</h1>
                </div>

                <div class="mt-6 p-6 bg-white border-b border-gray-200">
                    <h1>Daftar Rekrutmen yang kamu post!</h1>

                    @unless(count($listRekrutmen) == 0)
                        @foreach($listRekrutmen as $rekrutmen)
                            <div class="mt-2 p-6 bg-white border-b border-gray-200">
                                <h4>{{$rekrutmen->judul}}</h4>
                                <p>{{$rekrutmen->jumlah}}</p>
                                <p>{{$rekrutmen->status}}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="mt-2 p-6 bg-white border-b border-gray-200">
                            <p>Tidak ada rekrutmen yang dibuat</p>
                        </div>
                    @endunless
                </div>

                <div class="mt-6 p-6 bg-white border-b border-gray-200">
                    <h1>Request rekrutmen kamu!</h1>

                    @unless(count($listRequestRekrutmen) == 0)
                        @foreach($listRequestRekrutmen as $rekrutmen)
                            <div class="mt-2 p-6 bg-white border-b border-gray-200">
                                <h4>{{$rekrutmen->judul}}</h4>
                                <p>{{$rekrutmen->status}}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="mt-2 p-6 bg-white border-b border-gray-200">
                            <p>Kamu belum membuat request</p>
                        </div>
                    @endunless
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
