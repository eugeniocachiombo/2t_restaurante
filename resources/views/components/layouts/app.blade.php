<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('assets/images/logo/logo_icon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    <!-- alert and Select 2 -->
    @include('inc.head-assets')
</head>

<body class="dashboard dashboard_1">

    <div class="full_container">
        <div class="inner_container">

            <!-- Sidebar  -->
            @include('inc.sidebar')
            <!-- end sidebar -->


            <div id="content">
                <!-- topbar -->
                @include('inc.topbar')
                <!-- end topbar -->

                <!-- dashboard inner -->
                {{ $slot }}
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('assets/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/utils.js') }}"></script>
    <script src="{{ asset('assets/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/chart_custom_style1.js') }}"></script>

    <!-- Datatable and Select 2 -->
    @include('inc.foot-assets')
</body>

</html>
