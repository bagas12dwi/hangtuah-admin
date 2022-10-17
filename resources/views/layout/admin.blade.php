<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        SD Hang Tuah 7 Surabaya Admin | {{ $title }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Nucleo Icons -->
    <link href="{{ URL::asset('/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ URL::asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/trix.js') }}"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ URL::asset('/css/soft-ui-dashboard.css') }}" rel="stylesheet" />

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('components.side-bar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('components.navbar-admin')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('konten')
            @include('components.footer-admin')
        </div>

    </main>
    <!--   Core JS Files   -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::asset('/js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('/js/plugins/smooth-scrollbar.min.js') }}"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ URL::asset('/js/soft-ui-dashboard.min.js') }}"></script>
</body>

</html>
