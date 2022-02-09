<style>
    #menu_hovers li a:hover{
        font-weight: bold;
        color: blue;
    }
</style>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="{{ asset('asset/image/brand-logo.png') }}" alt="logo" height="50">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" id="menu_hovers">
                <li><a href="/" class="nav-link px-2 link-secondary class_homepage">{{__('text.Home_page')}}</a></li>
                <li><a href="{{ route('job.index') }}" class="nav-link px-2 link-dark class_jobs">{{__('text.Job_page')}}</a></li>
                <li><a href="{{ route('about.index') }}" class="nav-link px-2 link-dark class_aboutus">{{__('text.About_us')}}</a></li>
            </ul>

            <form class="d-flex col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ route('searchjob') }}" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchjob">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>


            <ul class="navbar-nav me-3">
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                            @endif
                        @endforeach
                        </div>
                </li>
            </ul>

        @auth
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('asset/image/user.png') }}" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item text-capitalize fw-bold" href="#"><i class="bi bi-person"></i> {{ Auth::user()->username }}</a></li>
                <li><a class="dropdown-item"
                    href="@if(Auth::user()->gid==1){{ route('admin.dashboard') }}
                    @elseif(Auth::user()->gid==2){{ route('agency.dashboard') }}
                    @else{{ route('user.dashboard') }}
                    @endif"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-power"></i> Sign out</a></li>
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
    </div><!-- end container -->
</header>