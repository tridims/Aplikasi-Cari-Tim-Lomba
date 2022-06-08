<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"/>
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
                    <a class="nav-link me-4 active " href="#">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="icon-home "></div>
    </div>
</nav>
<!-- End Navbar -->

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
