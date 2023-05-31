<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventaris Gudang</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon"
        href="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/6f785431b93663a6e5eda1f3cedc13b4.png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
        }

        html,
        body {
            background-color: #EFEAE6;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Mulai</a>
            @else
            @endauth
        </div>
        @endif

        <div class="container-xxl vh-100 row">
            <div class="col-md-6">
                <h1 style="font-weight: 800;color: black;margin: 10rem 0 4rem 0;">Aplikasi Wirausaha Lengkap <br> Kelola
                    Bisnis jadi Maju</h1>
                @if(Route::has('login'))
                @auth
                @if(Auth()->user()->level == 'admin')
                <div class="content">
                    <div class="col-md-6">
                        <form action="/" method="get">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="keyword"
                                    value="{{Request::get('keyword')}}" placeholder="Cari Apa?" aria-label="Search"
                                    aria-describedby="button-addon2">
                                <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-body p-0">
                                <div class="alert alert-primary" role="alert">
                                    Hasil Pencarian untuk : {{Request::get('keyword')}}
                                </div>
                                @if(Request::get('keyword'))

                                <div class="table-resposive py-0">
                                    <table class="table-hover table py-0">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>

                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barang as $d)
                                            <tr>
                                                <td>{{$d->nama_barang}}</td>

                                                <td>
                                                    <a href="/barang/{{$d->id}}"
                                                        class="btn btn-sm btn-primary">Detail</a>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @else
                <div class="col-md-12">
                    <a class="btn px-4 py-2 border btn-success fs-3 fw-bold" href="{{ route('login') }}">Login</a>
                </div>
                @endauth
                @endif
            </div>
            <div class="col-md-6 d-flex align-items-end justify-content-end">
                <img src="{{asset ('image/bg-welcome.png')}}" class="vw-50" alt="">
            </div>
        </div>



    </div>
</body>

</html>
