<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="{{ asset('asset/image/brand-logo.png') }}" alt="logo" height="50">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Jobs</a></li>
                <li><a href="{{ route('about.index') }}" class="nav-link px-2 link-dark">About Us</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

        @auth
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('asset/image/user.png') }}" alt="mdo" width="32" height="32" class="rounded-circle">
                    {{-- <i class="bi bi-person-circle d-block mx-auto mb-1 text-center" style="font-size:32px;"></i> --}}
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
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


            @php $locale = session()->get('locale'); @endphp
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @switch($locale)
                        @case('en')
                        <img src="{{asset('asset/image/united-kingdom.png')}}" width="25px"> English
                        @break
                        @case('th')
                        <img src="{{asset('asset/image/thailand.png')}}" width="25px"> Thai
                        @break
                        @default
                        <img src="{{asset('asset/image/united-kingdom.png')}}" width="25px"> Khmer
                    @endswitch
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lang/en"><img src="{{asset('images/flag/en.png')}}" width="25px"> English</a>
                    <a class="dropdown-item" href="lang/fr"><img src="{{asset('images/flag/fr.png')}}" width="25px"> Français</a>
                </div>
            </li>


        </div>
    </div><!-- end container -->
</header>