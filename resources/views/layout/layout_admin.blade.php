<!doctype html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Datatable -->
        <link rel="stylesheet" href="{{ asset('asset/datatable/dataTables.bootstrap5.min.css') }}">
        <!-- OwlCarousel -->
        <link rel="stylesheet" href="{{ asset('asset/owlcarousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/owlcarousel/owl.theme.default.min.css') }}">
        <!-- Global Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/global_custom.css') }}">
        <!-- Individual Custom CSS -->
        @yield('style')
    </head>
    <body>
        
        <div id="main_wrapper">
            <!-- Header for app/ Admin_header for admin/ remove for Guest  -->
            @include('layout.header_admin')

            <div id="page_wrapper">
                @yield('content')
            </div>
            <!-- Footer for app only  -->
            {{-- @include('layout.footer') --}}
        </div>



        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('asset/jquery/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Datatable -->
        <script src="{{ asset('asset/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('asset/datatable/jquery.dataTables.min.js') }}"></script>
        <!-- OwlCarousel -->
        <script src="{{ asset('asset/owlcarousel/owl.carousel.min.js') }}"></script>
        <!-- Global Custom JS -->
        <script src="{{ asset('js/global_custom.js') }}"></script>
        <!-- Individual Custom CSS -->
        @yield('script')
    </body>
</html>