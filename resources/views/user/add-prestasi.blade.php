<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Prestasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="profile.css" />
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

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 p-3 rounded bg-white">
            <h1 class="text-center">Tambah Prestasi</h1>
            <form action="{{route('store_prestasi')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-1">
                        <label>Nama Pertandingan</label>
                        <input type="text" class="form-control" name="nama" value="{{old('nama')}}" />
                        @error('nama')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Tingkat</label>
                        <input type="text" class="form-control" name="tingkat" value="{{old('tingkat')}}" />
                        @error('tingkat')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Penyelenggara</label>
                        <input type="text" class="form-control" name="penyelenggara" value="{{old('penyelenggara')}}" />
                        @error('penyelenggara')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tahun" value="{{old('tahun')}}" />
                        @error('tahun')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Peringkat</label>
                        <input type="text" class="form-control" name="peringkat" value="{{old('peringkat')}}" />
                        @error('peringkat')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Sertifikat</label>
                        <input type="file" class="form-control" name="sertifikat" id="sertifikat" value="{{old('sertifikat')}}" />
                        @error('sertifikat')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-primary" type="submit">save</button>
                    <a class="btn btn-primary" href="{{route('profile')}}" role="button">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
