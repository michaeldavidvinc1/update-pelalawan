<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard &mdash; Rs-Pelalawan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('assets/dashboard/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dashboard/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('dashboard.partials.navbar')
            <div class="main-sidebar sidebar-style-2">
                @include('dashboard.partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('container')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> Kabupaten Pelalawan
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('assets/dashboard/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/popper.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('assets/dashboard/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/chart.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('assets/dashboard/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('assets/dashboard/js/page/index.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('assets/dashboard/js/scripts.js') }}"></script>
    <script src="{{ url('assets/dashboard/js/custom.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ url('https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js') }}"></script>
</body>

</html>
