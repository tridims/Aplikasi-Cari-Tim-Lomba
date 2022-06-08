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
    <!-- daftar rekrutmen -->
    <div class="d-flex justify-content-center">
        <div class="card mt-5 p-3">
            <h4>Daftar Pengumuman Rekrutmen yang kamu buat</h4>

            <table class="table table-hover mt-4 w-auto border">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Lomba</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Info</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listRekrutmen as $rekrutmen)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$rekrutmen->judul}}</td>
                        <td>
                            <a href="{{route('detail_lomba', ['lomba'=>$rekrutmen->lomba->id])}}">{{$rekrutmen->lomba->nama}}</a>
                        </td>
                        <td>{{$rekrutmen->request_diterima->count()}}/{{$rekrutmen->jumlah}}</td>
                        <td>
                            <a href="{{route('detail_rekrutmen', ['rekrutmen'=>$rekrutmen->id])}}"
                               class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- end daftar rekrutmen -->
</div>
</body>

</html>
