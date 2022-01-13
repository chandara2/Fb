<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img src="{{ asset('asset/image/brand-logo.png') }}" alt="logo" height="50">
            </a>

            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
                <a href="#" class="nav-link text-secondary" style="">
                    <i class="bi bi-house-door d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-speedometer2 d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-table d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                Orders
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white" style="">
                    <i class="bi bi-grid d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                Products
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link text-white dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="">
                    <i class="bi bi-person-circle d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                Setting
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item text-capitalize fw-bold" href="#">{{ Auth::user()->username }}</a></li>
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                    <li role="separator" class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>

                    
                
            </li>
            </ul>
        </div>
        </div>
    </div>
</header>
