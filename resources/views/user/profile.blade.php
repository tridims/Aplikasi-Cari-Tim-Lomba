<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"/>
    <link rel="stylesheet" href="profile.css"/>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fix-top py-3" style="background-color: #242526">
    <div class="container">
        <a class="navbar-brand" href="{{route('daftar_lomba')}}"><span>Cari</span>Lomba</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-end align-items-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-4 active " href="{{route('dashboard')}}">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="icon-home "></div>
    </div>
</nav>
<div class="container rounded bg-white mt-5 mb-5">
    <div>
        <h1 class="text-center">Profil</h1>
    </div>

    <!-- Profile -->
    <div class="row">
        <div class="col-md-4 border-right" id="col1">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if(! $user->foto)
                    <img src="{{asset($foto)}}" class="rounded-circle" alt="foto" width="150px">
                @else
                    <img width="150px"
                         src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"/>
                @endif
                <a href="{{$profil->linkedin}}">linkedin</a>
                @if(!empty($profil->cv))
                    <a href="{{asset('storage/'.$profil->cv)}}">CV</a>
                @endif

            </div>
        </div>
        <div class="col-md-4 border-right">
            <div class="p-3 py-5">
                <div class="row">

                    <div class="col-md-12">
                        <label class="labels">Nama</label><input type="text" class="form-control" placeholder="Nama"
                                                                 value="{{$profil->nama}}" readonly/>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Nim</label><input type="text" class="form-control" placeholder="Nim"
                                                                value="{{$profil->nim}}" readonly/>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Jenis Kelamin</label><input type="text" class="form-control"
                                                                          placeholder="Nim"
                                                                          value="{{$profil->jenis_kelamin}}" readonly/>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Telepon</label><input type="text" class="form-control"
                                                                    placeholder="enter phone number"
                                                                    value="{{$profil->telepon}}" readonly/>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Angkatan</label><input type="text" class="form-control"
                                                                     placeholder="Angkatan"
                                                                     value="{{$profil->angkatan}}" readonly/>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Prodi</label>
                        <input type="text" class="form-control" placeholder="TIF" value="{{$profil->prodi}}" readonly/>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Fakultas</label>
                        <input type="text" class="form-control" placeholder="filkom" value="{{$profil->fakultas}}" readonly/>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="col-md-12">
                    <label class="labels">Description</label>
                    <textarea class="form-control" id="textAreaDesc" readonly
                              rows="17">{{$profil->deskripsi}}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Prestasi -->
    <div class="card mt-5 p-3">
        <label>Daftar Prestasi</label>
        <table class="table table-hover mt-4 w-auto border">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tingkat</th>
                <th scope="col">Penyelenggara</th>
                <th scope="col">Tahun</th>
                <th scope="col">Peringkat</th>
                <th scope="col">Sertifikat</th>
            </tr>
            </thead>
            <tbody>
            @unless($prestasi->isEmpty())
                @foreach($prestasi as $prestasi)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$prestasi->nama}}</td>
                        <td>{{$prestasi->tingkat}}</td>
                        <td>{{$prestasi->penyelenggara}}</td>
                        <td>{{$prestasi->tahun}}</td>
                        <td>{{$prestasi->peringkat}}</td>
                        <td>
                            @if(!empty($prestasi->sertifikat))
                                <a href="{{asset('storage/'.$prestasi->sertifikat)}}">Sertifikat</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">Tidak ada prestasi</td>
                </tr>
            @endunless
            </tbody>

        </table>
    </div>


    <div class="mt-5 text-center">
        @if($private)
            <a class="btn btn-primary" href="{{route('edit_profil')}}" role="button">Edit Profil</a>
            <a class="btn btn-primary" href="{{route('add_prestasi')}}" role="button">Tambah Riwayat Lomba</a>
        @endif

    </div>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</html>
