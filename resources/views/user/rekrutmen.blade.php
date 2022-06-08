<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Rekrutmen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container-fluid">
                    <!-- daftar rekrutmen -->
                    <div class="d-flex justify-content-center">
                        <div class="card mt-5 p-3">
                            <h4>Daftar Pengumuman Rekrutmen yang kamu buat</h4>

                            <table class="table table-hover mt-4 w-auto border">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Lomba</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Info</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listRekrutmen as $rekrutmen)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$rekrutmen->judul}}</td>
                                        <td>
                                            <a href="{{route('detail_lomba', ['lomba'=>$rekrutmen->lomba->id])}}">{{$rekrutmen->lomba->nama}}</a>
                                        </td>
                                        <td>{{$rekrutmen->request_diterima->count()}}/{{$rekrutmen->jumlah}}</td>
                                        <td>
                                            <a href="{{route('detail_rekrutmen_user', ['rekrutmen'=>$rekrutmen->id])}}"
                                               class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- end daftar rekrutmen -->


                    <!-- daftar request -->
                    <div class="d-flex justify-content-center">
                        <div class="card mt-5 p-3">
                            <h4>Daftar request yang kamu buat</h4>

                            <table class="table table-hover mt-4 w-auto border">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul Rekrutmen</th>
                                    <th scope="col">Lomba</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listRequestRekrutmen as $r)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <a href="{{route('detail_rekrutmen', ['rekrutmen'=>$r->idRekrutmen])}}">{{$r->judul}}</a>
                                        </td>
                                        <td>
                                            <a href="{{route('detail_lomba', ['lomba'=>$r->idLomba])}}">{{$r->lomba->nama}}</a>
                                        </td>
                                        <td>{{$r->status}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end daftar request -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
