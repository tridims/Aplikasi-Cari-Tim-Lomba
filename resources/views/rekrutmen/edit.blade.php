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

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header text-center">Edit</div>
                <form action="{{route('update_rekrutmen', ['rekrutmen'=>$rekrutmen])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-2">
                        <div class="col-md-12">
                            <label class="labels">Judul</label>
                            <input type="text" class="form-control" placeholder="Judul" name="judul" value="{{$rekrutmen->judul}}" />
                            @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Max Anggota</label>
                            <input type="text" class="form-control" placeholder="Max" name="jumlah" value="{{$rekrutmen->jumlah}}" />
                            @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Description</label>
                            <textarea class="form-control" id="textAreaDesc" name="deskripsi" rows="5">{{$rekrutmen->deskripsi}}</textarea>
                            @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2 d-flex justify-content-around">
                            <button class="btn btn-primary mr-3">Save</button>
                            <a class="btn btn-primary" href="{{redirect()->back()}}">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
