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
    <!-- Bootstrap Toggle CSS -->
    <link rel="stylesheet" href="{{ asset('asset/bootstrapToggle/bootstrap-toggle.min.css') }}">
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('asset/datatable/dataTables.bootstrap5.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('asset/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/slick/slick-theme.css') }}">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{asset('asset/summernote/summernote-lite.min.css')}}">
    <!-- Global Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/global_custom.css') }}">
    <!-- Individual Custom CSS -->
    @yield('style')
</head>
<body cz-shortcut-listen="true">
    
    @include('layout.header')
    
    <div class="container-fluid">
        <div class="row">

            @include('layout.sidebar')
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-white vh-100">
                @yield('content')
            </main>
        </div>
    </div>
    
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('asset/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('asset/popper/popper.min.js') }}"></script>
    <script src="{{ asset('asset/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstap Toggle JS -->
    <script src="{{ asset('asset/bootstrapToggle/bootstrap-toggle.min.js') }}"></script>
    <!-- Datatable -->
    <script src="{{asset('asset/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('asset/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('asset/slick/slick.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('asset/summernote/summernote-lite.min.js') }}"></script>

    <!-- Auto Resize Textarea -->
    <script src="{{ asset('asset/autosize.min.js') }}"></script>
    <!-- Global Custom JS -->
    <script src="{{ asset('js/global_custom.js') }}"></script>
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Individual Custom CSS -->
    @yield('script')
    
</body>
</html>
