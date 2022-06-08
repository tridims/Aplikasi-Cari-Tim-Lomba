<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="detail.css">
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
                <li class="nav-item">
                    <a class="nav-link me-4 active " href="{{route('profile')}}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4 active " href="{{route('rekrutmen')}}">Rekrutmen</a>
                </li>
            </ul>

        </div>
        <div class="icon-home "></div>
    </div>
</nav>

<div class="container mt-3">
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

        <div class="d-flex justify-content-center">
            <td>
                <form action="{{route('create_request', $rekrutmen)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Ajukan Permintaan</button>
                </form>
            </td>
            <td>
                <a class="btn btn-primary m-2" href="{{url()->previous()}}">Kembali</a>
            </td>
        </div>

    </div>
</div>

</body>

</html>
