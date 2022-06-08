<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Tambah Lomba</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
        crossorigin="anonymous"
    />
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
            </ul>
        </div>
        <div class="icon-home "></div>
    </div>
</nav>

<!-- Tambah Lomba -->

<div class="container rounded bg-white mt-5 mb-5">
    <h1 class="text-center">Tambah Lomba</h1>
    <form action="{{route("store_rekrutmen", $lomba)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Input judul -->
            <div class="mb-1">
                <label>Masukkan judul rekrutmen</label>
                <input type="text" class="form-control" name="judul" value="{{old('judul')}}"/>
                @error('judul')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input -->

            <!-- Input Deadline Jumlah -->
            <div class="mb-1">
                <label>Masukkan jumlah anggota yang dicari</label>
                <input type="text" class="form-control" name="jumlah"
                       value="{{old('jumlah')}}"/>
                @error('jumlah')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input -->

            <!-- Input Deskripsi -->
            <div class="mb-3 mt3">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi" rows="10">{{old('deskripsi')}}</textarea>
                @error('deskripsi')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <!-- End Input -->
        </div>

        <div class="text-center mt-2 button">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{ URL::previous() }}" role="button">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>

