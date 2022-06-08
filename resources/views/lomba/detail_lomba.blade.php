<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Detail Lomba</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css"/>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fix-top py-3" style="background-color: #242526">
    <div class="container">
        <a class="navbar-brand" href="#"><span>Cari</span>Lomba</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-end align-items-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-4 active " aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link me-4 " href="# ">Profil</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link me-4 " href="# ">Pemberitahuan</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link me-4 " href="# ">Rekrutmen</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link me-4 " href="# ">Lomba Yang diikuti</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link me-4 " href="# ">Lomba Terbaru</a>
                </li>
            </ul>
        </div>
        <div class="icon-home "></div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Judul -->
<div class=" container bg">
    <div class="rounded ">
        <div class="card judul ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <h1 class="Judul">{{$lomba->nama}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deskripsi -->
<div class="container">
    <div class="card deskripsi">
        <div class="row d-flex justify-content-center mt-4 mb-4">
            <div class="col-md-6">
                <div class="deskripsi">
                    <h3 class="Judul">Deskripsi Perlombaan </h3>
                </div>
                <!-- Tingkat -->
                <div class="card Tema">
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-6">
                            <h6 class="Tema">Tingkat :</h6>
                            <p>{{$lomba->tingkat}}</p>
                        </div>
                    </div>
                </div>

                <!-- Tema lomba -->
                <div class="card Tema">
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-6">
                            <h6 class="Tema">Kategori</h6>
                            <p>{{$lomba->kategori}}</p>
                        </div>
                    </div>
                </div>

                <!-- Kategori Lomba -->
                <div class="card kategori">
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-6">
                            <h6 class="Judul">Kategori Lomba : </h6>
                            <p>{{$lomba->kategori}}</p>
                        </div>
                    </div>
                </div>

                <div class="card tanggal">
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-6">
                            <h6 class="Judul">Tanggal Pendaftaran : </h6>
                            <p>{{$lomba->deadline_pendaftaran}}</p>
                        </div>
                    </div>
                </div>

                <!-- Penyelenggara -->
                <div class="card poster">
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-6">
                            <div class="penyelenggara">
                                <h6>Penyelenggara : </h6>
                                <p>{{$lomba->penyelenggara}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Website -->
                <div class="card poster">
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-6">
                            <div class="penyelenggara">
                                <h6>Website : </h6>
                                <a href="{{$lomba->website}}">{{$lomba->website}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- poster -->
                <div class="card poster">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="poster">
                                <figure class="figure">
                                    <img
                                        src="{{$lomba->poster ? asset('storage/poster' . $lomba->poster) : asset('/images/no-poster.png')}}"
                                        class="figure-img img-fluid rounded 25rem;" alt="poster">
                                    <figcaption class="figure-caption">Poster {{$lomba->nama}}</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end poster -->

                <!-- isi deskripsi -->
                <div class="card judul">
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-6">
                            <h6>Deskripsi</h6>
                            <p>
                                {{$lomba->deskripsi}}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end deskripsi -->

            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 p-1">
                <table class="table table-hover mt-4 w-auto border">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Recruitor</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Info</th>
                    </tr>
                    </thead>

                    <tbody>
                    @unless($daftar_rekrutmen->isEmpty())
                        @foreach($daftar_rekrutmen as $rekrutmen)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$rekrutmen->judul}}</td>
                                <td>{{$rekrutmen->nama}}</td>
                                <td>{{$rekrutmen->request_diterima->count()}}/{{$rekrutmen->jumlah}}</td>
                                <td>
                                    <a href="{{route('detail_rekrutmen', ['rekrutmen' => $rekrutmen->id])}}"
                                       class="btn btn-primary btn-sm">Info</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <h3 class="text-center">Belum ada rekrutmen</h3>
                            </td>
                        </tr>
                    @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid text-center">

    <a class="d-grid mt-5 mb-5" href="{{route('add_rekrutmen', ['lomba'=>$lomba->id])}}">
        <button class="btn-rekrutmen btn btn-primary" type="button">Buat Rekrutmen</button>
    </a>

    @if($isAuthor)
        <a class="d-grid mt-5 mb-5" href="{{route('edit_lomba', ['lomba'=>$lomba->id])}}">
            <button class="btn-rekrutmen btn btn-secondary" type="button">Edit</button>
        </a>

        <form>
            @csrf
            @method('DELETE')
            <a class="d-grid mt-5 mb-5" href="{{route('delete_lomba', $lomba)}}">
                <button class="btn-rekrutmen btn btn-danger" type="submit">Delete</button>
            </a>
        </form>
    @endif
</div>

</body>
</html>
