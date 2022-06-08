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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
