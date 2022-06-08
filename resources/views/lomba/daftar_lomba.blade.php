<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <!-- custom css -->
    {{--    <link rel="stylesheet" href="/css/style.css">--}}
    <title>Daftar Lomba</title>
</head>
<body>
<div class="container-fluid">
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
    <!-- Navbar -->

    <!-- heading -->
    <div class="container-fluid mb-5 col-md-7">
        <div class="rounded">
            <div class="card judul">
                <div div class="row d-flex justify-content-center">
                    <div class="col-md-4">
                        <h1 class="Judul">Daftar Perlombaan</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- heading -->

    <div class="container-fluid mb-5 col-md-7">
        <div class="card">
            <!-- List Lomba -->
            @unless($daftar_lomba->isEmpty())
                @foreach($daftar_lomba as $lomba)
                    <div class="container-fluid mt-3 mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$lomba->nama}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted" id="kategori">
                                            {{$lomba->kategori}}
                                        </h6>
                                        <p class="card-text">
                                            Perlombaan {{$lomba->tingkat}} | Deadline Pendaftaran
                                            : {{$lomba->deadline_pendaftaran}}
                                        </p>
                                        <button type="button" class="btn btn-outline-primary">
                                            <a href="{{route("detail_lomba", ['lomba'=>$lomba])}}">Detail</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="container-fluid mt-3 mb-3">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Belum ada lomba</h5>
                                    <h6 class="card-subtitle mb-2 text-muted" id="kategori">
                                        Belum ada lomba yang teracatat sistem
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endunless
            <!-- end list lomba -->

            <!-- Page -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            {{$daftar_lomba->links()}}
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="button-add">
                <div class="d-grid mt-5 mb-5">
                    <a class="btn btn-primary mx-5" href="{{route('add_lomba')}}">Tambah Lomba</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
