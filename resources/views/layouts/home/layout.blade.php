<!DOCTYPE html>
<html lang="id">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Page</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <nav class="navbar fixed-top navbar-expand-md p-3 bg-white shadow bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
                    id="navbarCollapse">
                    <a href="/"
                        class="navbar-brand d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        ADMIN
                    </a>
                    <ul class="navbar-nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Beranda</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Fitur</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Harga</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Katalog</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">FaQ</a></li>
                    </ul>

                    {{-- @if (Auth::user()) --}}
                    <div class="text-end">
                        <a href="/">
                            <button type="button" class="btn btn-primary me-2 active">Login</button>
                        </a>
                        <a href="/register">
                            <button type="button" class="btn btn-outline-primary">Register</button>
                        </a>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </nav>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        @yield('container')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('/js/common.min.js') }}"></script>
    <script src="{{ asset('/js/custom.min.js') }}"></script>
    <script src="{{ asset('/js/settings.js') }}"></script>
    <script src="{{ asset('/js/gleek.js') }}"></script>
    <script src="{{ asset('/js/styleSwitcher.js') }}"></script>

    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/js/datatable-basic.min.js') }}"></script>

</body>

</html>
