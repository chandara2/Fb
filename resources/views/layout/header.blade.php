<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <img src="{{ asset('asset/image/brand-logo.png') }}" alt="logo" height="50">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Jobs</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">About Us</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        @auth
        <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item text-capitalize fw-bold" href="#">{{ Auth::user()->username }}</a></li>
            <li><a class="dropdown-item" href="{{ route('admindb') }}">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
            </ul>
        </div>
        @endauth
        @guest
            <div class="text-end">
                <a href="{{ route('showlogin') }}" class="btn brand_outline_btn3">Login</a>
                <a href="{{ route('showregister') }}" class="btn brand_btn3">Register</a>
            </div>
        @endguest
        </div>
    </div>
</header>