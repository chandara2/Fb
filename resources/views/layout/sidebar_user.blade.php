<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                {{-- <i class='bx bx-layer nav_logo-icon'></i> --}}
                <i class='bx bxl-meta nav_logo-icon' ></i>
                <span class="nav_logo-name">FACEBOOK</span>
            </a>
            <div class="nav_list"> 
                <a href="#" class="nav_link"> 
                    <i class='bx bx-user-circle nav_icon'></i>
                    <span class="nav_name">{{ Auth::user()->username }}</span> 
                </a> 
                <a href="{{ route('user.dashboard') }}" class="nav_link {{ Request::is('user/dashboard') ? 'active' : '' }}"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Dashboard</span> 
                </a>
                <a href="{{ route('user.user.index') }}" class="nav_link {{ Request::is('user/user*') ? 'active' : '' }}"> 
                    <i class='bx bx-user nav_icon'></i> 
                    <span class="nav_name">Users</span> 
                </a>
                <a href="{{ route('user.fb.index') }}" class="nav_link {{ Request::is('user/fb*') ? 'active' : '' }}"> 
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                    <span class="nav_name">FB Reports</span> 
                </a> 
            </div>
        </div> <a href="{{ route('logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>