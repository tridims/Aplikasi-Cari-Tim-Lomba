<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Edit Profil</title>
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
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6 p-3 rounded bg-white">
            <h1 class="text-center">Edit Profil</h1>
            <form ation="{{route('update_profil')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-1">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" value=""/>
                        @error('foto')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{$profil->nama}}"/>

                        @error('nama')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Nim</label>
                        <input type="text" class="form-control" name="nim" value="{{$profil->nim}}"/>
                        @error('nim')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenis_kelamin" value="{{$profil->jenis_kelamin}}"/>
                        @error('jenis_kelamin')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telepon" value="{{$profil->telepon}}"/>
                        @error('telepon')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>linkedin</label>
                        <input type="text" class="form-control" name="linkedin" value="{{$profil->linkedin}}"/>
                        @error('linkedin')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" value="{{$profil->angkatan}}"/>
                        @error('angkatan')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Prodi</label>
                        <input type="text" class="form-control" name="prodi" value="{{$profil->prodi}}"/>
                        @error('prodi')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label>Fakultas</label>
                        <input type="text" class="form-control" name="fakultas" value="$profil->fakultas"/>
                        @error('fakultas')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label>Deskripsi</label>
                        <textarea class="form-control" id="textAreaDesc" name="deskripsi" rows="3">{{$profil->deskripsi}}</textarea>
                        @error('deskripsi')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label>CV</label>
                        <input type="file" class="form-control" name="cv" id="cv" value=""/>
                        @error('cv')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <!-- <div class="mb-1"><label>Detail Tambahan</label><input type="text" class="form-control" name="additional" value="sth" />
            </div> -->
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
