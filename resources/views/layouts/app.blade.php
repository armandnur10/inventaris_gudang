<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventaris Gudang</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard-all/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    <!-- Fonts -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="shortcut icon"
        href="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/6f785431b93663a6e5eda1f3cedc13b4.png">

    <link rel="stylesheet" href="{{asset('css/index.css')}}">

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <!-- Styles -->
    <style>
        @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Montserrat', sans-serif;
        }

        .pengajuan_ {
            display: none;
        }

        .perubahan_ {
            display: none;
        }

        @media screen and (max-width: 1150px) {
            td.pengajuan {
                display: none;
            }

            th.pengajuan {
                display: none;
            }

            .pengajuan_ {
                display: block;
            }
        }

        @media screen and (max-width: 700px) {
            td.status_perubahan {
                display: none;
            }

            th.status_perubahan {
                display: none;
            }

            .perubahan_ {
                display: block;
            }

            .pengajuan_ {
                max-width: 50vw;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;

            }
        }

    </style>



</head>

<body>
    <div id="app">
        @if(Route::has('login'))
        @auth
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="/home">Inventaris Gudang</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/home" class="nav-link">Dashboard</a>
                        </li>
                        @if(Auth()->user()->level == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/barang">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ruangan">Ruangan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/user">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/kategori">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a href="/submission" class="nav-link">Response Pengajuan</a>
                        </li>
                        @elseif(Auth()->user()->level == 'pic')
                        <li class="nav-item">
                            <a href="/pic" class="nav-link">Kelola Ruangan</a>
                        </li>
                        <li class="nav-item">
                            <a href="/submission" class="nav-link">Pengajuan Perubahan</a>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{Auth()->user()->name}}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                <li><a class="dropdown-item" href="/">Landing Page</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        @else
        @endauth
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });

    </script>
    <script>
        var konten = document.getElementById("konten");
        CKEDITOR.replace(konten, {
            width: '100%',
            height: '100px',
            extraPlugins: 'editorplaceholder',
            editorplaceholder: 'Deskripsi spesifikasi barang...',
            uiColor: '#CCEAEE'
        });
        CKEDITOR.config.allowedContent = true;

    </script>
</body>

</html>
