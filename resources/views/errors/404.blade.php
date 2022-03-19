<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center w-100 vh-100 fadeLogin">
            <div class="text-center">
                <h1 class="text-danger display-1">404</h1>
                <h3>Page not found</h3>
                <p class="text-muted my-4">
                    Un oh, we can't seem to find the page you're looking for.
                </p>
                <button class="btn btn-outline-success mb-5" onclick="goBack()">Go
                    Back</button>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
