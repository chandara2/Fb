<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse position-fixed">
    <div class="position-sticky pt-3">
        <a href="#" class="align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <div class="fs-4 text-center">Facebook</div>
        </a>
        <hr class="text-dark">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active {{ Request::path() === 'admin/dashboard' ? 'current_menus2' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/user*') ? 'current_menus2' : '' }}" href="{{ route('admin.user.index') }}">
                    <i class="bi bi-people"></i>
                    User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/fb*') ? 'current_menus2' : '' }}" href="{{ route('admin.fb.index') }}">
                    <i class="bi bi-activity"></i>
                    FB Reports
                </a>
            </li>
        </ul>
    </div>

    <div class="position-absolute pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                Logout
                </a>
            </li>
        </ul>
    </div>
</nav>



{{-- <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-light" style="width: 300px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Facebook</span>
    </a>
    <hr class="text-dark">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            User
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Fb Reports
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{ auth()->user()->username; }}</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="#">{{ auth()->user()->username; }}</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
        </ul>
    </div>
</div> --}}