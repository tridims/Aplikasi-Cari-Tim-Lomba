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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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
