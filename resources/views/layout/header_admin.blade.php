<header>
    <div class="px-3 bg-dark text-white">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                FB
            </a>

            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small" id="current_menus_hover2">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link link-light {{ Request::path() === 'admin/dashboard' ? 'current_menus2' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}" class="nav-link link-light {{ Request::is('admin/user*') ? 'current_menus2' : '' }}">
                        User
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-light {{ Request::is('admin/job*') ? 'current_menus2' : '' }}">
                        Record
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Setting
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item text-capitalize fw-bold" href="#"><i class="bi bi-person"></i> {{ Auth::user()->username }}</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-power"></i> Logout</a></li>
                    </ul>

                </li>
            </ul>
        </div>
        </div>
    </div>
</header>