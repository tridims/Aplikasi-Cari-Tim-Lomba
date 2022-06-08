<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container">
                    <div class="card">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="labels">Judul</label>
                                    <input type="text" class="form-control" placeholder="Judul" value="{{$rekrutmen->judul}}" readonly />
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Status</label>
                                    <input type="text" class="form-control" placeholder="Judul" value="{{$rekrutmen->status}}" readonly />
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Max Anggota</label>
                                    <input type="text" class="form-control" placeholder="Max" value="{{$rekrutmen->jumlah}}" readonly />
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Jumlah Anggota</label><input type="text" class="form-control" placeholder="Jumlah" value="{{$daftarAnggota->count()}}" readonly />
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Description</label>
                                    <textarea class="form-control" id="textAreaDesc" readonly rows="3">{{$rekrutmen->deskripsi}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-6">
                            <h4 class="labels d-flex justify-content-center mt-2">Daftar Anggota (Diterima)</h4>
                            <div class="d-flex justify-content-center">
                                <table class="table table-hover border w-auto">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">Info</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @unless($daftarAnggota->count() == 0)
                                        @foreach($daftarAnggota as $anggota)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$anggota->profile->nama}}</td>
                                                <td>{{$anggota->profile->prodi}}</td>
                                                <td>
                                                    <a href="{{route('public_profil', $anggota->user->id)}}" class="btn btn-primary">Lihat</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">Tidak ada anggota</td>
                                        </tr>
                                    @endunless
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-md-12 mt-6 mb-6">
                            <h4 class="labels d-flex justify-content-center">Daftar Permintaan</h4>
                            <div class="d-flex justify-content-center">
                                <table class="table table-hover border w-auto">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">Info</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @unless($daftar_request->count() == 0)
                                        @foreach($daftar_request as $request)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$request->user->profile->nama}}</td>
                                                <td>{{$request->user->profile->prodi}}</td>
                                                <td>
                                                    <a href="{{route('public_profil', $request->user->id)}}" class="btn btn-primary">Lihat</a>
                                                </td>
                                                <td>
                                                    <form action="{{route('accept_request', ['requestRekrutmen'=>$request->id])}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success">Terima</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{route('refuse_request', ['requestRekrutmen'=>$request->id])}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">Tidak ada permintaan</td>
                                        </tr>
                                    @endunless

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <td>
                                <a class="btn btn-primary m-2" href="{{route('edit_rekrutmen', ['rekrutmen'=>$rekrutmen])}}">Update</a>
                            </td>
                            <td>
                                <form action="{{route('stop_rekrutmen', $rekrutmen)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Stop Recruitment</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-primary m-2" href="{{route('rekrutmen')}}">Kembali</a>
                            </td>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
