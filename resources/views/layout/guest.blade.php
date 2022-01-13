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
        <!-- Global Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/global_custom.css') }}">
        <!-- Individual Custom CSS -->
        @yield('style')
    </head>
    <body>
        
        <div id="main_wrapper">

            <div id="page_wrapper">
                @yield('content')
            </div>
            
        </div>



        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('asset/jquery/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Global Custom JS -->
        <script src="{{ asset('js/global_custom.js') }}"></script>
        <!-- Individual Custom CSS -->
        @yield('script')
    </body>
</html>