<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cari Tim</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div>
    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <h1>Daftar Lomba</h1>
    @unless(count($lomba) == 0)

        @foreach($lomba as $lomba_item)
            <div>
                <br>
                <h4>{{$lomba_item->nama}}</h4>
                <p>{{$lomba_item->deadline_pendaftaran}}</p>
                <p>{{$lomba_item->poster}}</p>
                <p>{{$lomba_item->kategori}}</p>
                <p>{{$lomba_item->penyelenggara}}</p>
                <p>{{$lomba_item->tingkat}}</p>
                <p>{{$lomba_item->website}}</p>
                <p>{{$lomba_item->deskripsi}}</p>
                <br>
            </div>
        @endforeach
        <br><h1>{{$lomba->links()}}</h1><br>

    @else
        <div>
            <p>Tidak ada lomba</p>
        </div>
    @endunless

    <h2>Daftar Rekrutmen</h2>
    @unless(count($rekrutmen) == 0)
        @foreach($rekrutmen as $rekrutmen_item)
            <div>
                <br>
                <h4>{{$rekrutmen_item->judul}}</h4>
                <p>Lomba : {{$rekrutmen_item->lomba->nama}}</p>
                <p>{{$rekrutmen_item->status}}</p>
                <p>{{$rekrutmen_item->jumlah}}</p>
                <p>{{$rekrutmen_item->deskripsi}}</p>
                <br>
            </div>
        @endforeach
        <br><h1>{{$rekrutmen->links()}}</h1><br>
    @else
        <div>
            <p>Tidak ada rekrutmen</p>
        </div>
    @endunless
</div>
</body>
</html>
