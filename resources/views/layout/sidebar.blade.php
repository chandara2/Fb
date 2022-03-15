<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                {{-- <i class='bx bx-layer nav_logo-icon'></i> --}}
                <i class='bx bxl-meta nav_logo-icon' ></i>
                <span class="nav_logo-name">FACEBOOK</span>
            </a>
            <div class="nav_list"> 
                <a href="{{ route('admin.profile.index') }}" class="nav_link"> 
                    <i class='bx bx-user-circle nav_icon'></i>
                    <span class="nav_name">{{ Auth::user()->username }}</span> 
                </a> 
                <a href="{{ route('admin.dashboard') }}" class="nav_link {{ Request::is('admin/dashboard') ? 'active' : '' }}"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Dashboard</span> 
                </a> 
                <a href="{{ route('admin.user.index') }}" class="nav_link {{ Request::is('admin/user*') ? 'active' : '' }}"> 
                    <i class='bx bx-user nav_icon'></i> 
                    <span class="nav_name">Users</span> 
                </a> 
                <a href="{{ route('admin.fb.index') }}" class="nav_link {{ Request::is('admin/fb*') ? 'active' : '' }}"> 
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                    <span class="nav_name">FB Reports</span> 
                </a> 
            </div>
        </div> 
        <a href="{{ route('logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>


<!-- Edit user modal start -->
{{-- <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_user_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" id="user_id">
                <div class="modal-body p-4 bg-light">
                    <div class="row">
                        <div class="col-lg">
                            <label for="fname">Family Name</label>
                            <input type="text" name="fname" id="fname" class="form-control">
                            <span class="text-danger error-text fname_error"></span>
                        </div>
                        <div class="col-lg">
                            <label for="gname">Given Name</label>
                            <input type="text" name="gname" id="gname" class="form-control">
                            <span class="text-danger error-text gname_error"></span>
                        </div>
                    </div>
                    <div class="my-2">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                        <span class="text-danger error-text username_error"></span>
                    </div>
                    <div class="my-2">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control">
                        <span class="text-danger error-text fname_error"></span>
                    </div>
                    <div class="my-2">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                        <span class="text-danger error-text password_error"></span>
                    </div>
                    <div class="my-2">
                        <label>Member</label>
                        <select name="gid" id="gid" class="form-select">
                            @foreach ($usergroups as $usergroup)
                                <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2">
                        <div class="col-lg">
                            <input class="form-check-input" type="checkbox" name="visible" id="visible"> Visible
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="edit_employee_btn" class="btn btn-success">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<!-- Edit user modal end -->