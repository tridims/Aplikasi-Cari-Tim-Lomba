<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Update Lomba</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/style.css"/>
</head>

<body>

<!-- Navbar -->
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

<div class="container rounded bg-white mt-5 mb-5">
    <h1 class="text-center">Update Lomba</h1>
    <form action="{{route("update_lomba", $lomba)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
            <!-- Input Nama -->
            <div class="mb-1">
                <label>Judul Lomba</label>
                <input type="text" class="form-control" name="nama" value="{{$lomba->nama}}"/>
                @error('nama')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input Nama -->

            <!-- Input Deadline Pendaftaran -->
            <div class="mb-1">
                <label>Deadline Pendaftaran</label>
                <input type="text" class="form-control" name="deadline_pendaftaran"
                       value="{{$lomba->deadline_pendaftaran}}"/>
                @error('deadline_pendaftaran')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input Deadline Pendaftaran -->

            <!-- Input kategori -->
            <div class="mb-1">
                <label>Kategori</label>
                <input type="text" class="form-control" name="kategori" value="{{$lomba->kategori}}"/>
                @error('kategori')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input Deadline Pendaftaran -->

            <!-- Input penyelenggara -->
            <div class="mb-1">
                <label>Penyelenggara</label>
                <input type="text" class="form-control" name="penyelenggara" value="{{$lomba->penyelenggara}}"/>
                @error('penyelenggara')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input Deadline Pendaftaran -->

            <!-- Input tingkat -->
            <div class="mb-1">
                <label>Tingkat Lomba (Univ, Kota, Kecamatan, Nasional, dst)</label>
                <input type="text" class="form-control" name="tingkat" value="{{$lomba->tingkat}}"/>
                @error('tingkat')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input Deadline Pendaftaran -->

            <!-- Input Website -->
            <div class="mb-1">
                <label>Website Informasi Lomba</label>
                <input type="text" class="form-control" name="website" value="{{$lomba->website}}"/>
                @error('website')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input Website -->

            {{-- TODO: Preview Images --}}
            <div class="mb-1">
                <label>Poster</label>
                <input type="file" class="form-control" name="poster" id="poster"/>
                @error('poster')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 mt3">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="10">{{$lomba->deskripsi}}</textarea>
                @error('deskripsi')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="text-center mt-2 button">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ URL::previous() }}" role="button">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>
