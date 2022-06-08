<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- custom CSS -->
    <link rel="stylesheet" href="../css/style2.css">
    <title>Cari Tim Lomba</title>
</head>
<body>
<!-- Navbar -->
<!-- Navbar -->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fix-top py-3" , style="background-color: #242526">
        <div class="container">
            <a class="navbar-brand" href="{{route('landing_page')}}"><span>Cari-Tim</span>Lomba</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-end align-items-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link me-4 active" aria-current="page" href="{{route('daftar_lomba')}}">Daftar Lomba</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link me-4 " href="{{route('daftar_rekrutmen')}}">Daftar Rekrutmen</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link me-4 " href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link me-4 " href="{{route('register')}}">Daftar</a>
                    </li>
                </ul>
            </div>
            <div class="icon-home"></div>
        </div>
    </nav>
</header>
<!-- Navbar -->

<!-- Heading banner -->
<!-- Home  -->
<section class="home " id="home ">
    <div class="container ">
        <div class="row height-100 ">
            <div class="col-lg-6 d-flex flex-column justify-content-end content-left ">
                <h1 class="heading ">Cari-Tim<span>Lomba</span></h1>
            </div>
            <p class="subheading text-white">
                Membantu Anda dalam Mencari Tim Lomba yang Anda Butuhkan.
            </p>
        </div>
        <!-- image -->
        <div class="col-lg-5 ms-auto mb-2 mb-lg-0 d-none d-lg-block ">
            <img src="/images/Startup_Flatline.png" class="img-fluid position-absolute top-10" alt="foto-1">
        </div>
    </div>
</section>
<!-- Heading banner -->


<!-- Lomba Terbaru -->
<div class="container-fluid">
    <div class="row">
        <div class="col mt-5">
            <div class="card">
                <div class="card-body">
                    <h6>Lomba Terbaru</h6>
                    <div class="row">
                        @foreach($daftar_lomba as $lomba)
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$lomba->nama}}</h5>
                                        <p class="card-text">{{$lomba->kategori}}</p>
                                        <a href="{{route('detail_lomba', ['lomba'=>$lomba->id])}}"
                                           class="btn btn-primary">Cek Lomba</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kategori lomba-->
<div class="container-fluid">
    <div class="row">
        <div class="col mt-5">
            <div class="card">
                <div class="card-body">
                    <h6>Kategori</h6>

                    <div class="row">

                        @foreach($daftar_rekrutmen as $rekrutmen)
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$rekrutmen->judul}}</h5>
                                        <p class="card-text">{{$rekrutmen->deskripsi}}</p>
                                        <a href="{{route('detail_rekrutmen', ['rekrutmen' => $rekrutmen])}}"
                                           class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
