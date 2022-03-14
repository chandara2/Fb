<!DOCTYPE html>
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
    <!-- Global Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/global_custom.css') }}">
    <!-- Boxicons -->
    <link rel="stylesheet" href="{{ asset('asset/icons/boxicons.min.css') }}">
    <!-- Individual Custom CSS -->
    @yield('style')
</head>
<body cz-shortcut-listen="true" id="body-pd">

    @include('layout.headerfb')

    @include('layout.sidebarfb')

    <!--Container Main start-->
    <div class="height-100 bg-light">
        @yield('contentfb')
    </div>
    <!--Container Main end-->
    
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('asset/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('asset/popper/popper.min.js') }}"></script>
    <script src="{{ asset('asset/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{asset('asset/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('asset/datatable/dataTables.bootstrap5.min.js') }}"></script>
    
    <!-- Global Custom JS -->
    <script src="{{ asset('js/global_custom.js') }}"></script>
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Individual Custom CSS -->
    @yield('script')
    
</body>
</html>

