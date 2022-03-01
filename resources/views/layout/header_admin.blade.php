<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <img src="{{ asset('asset/image/brand-logo.png') }}" alt="logo" height="50">
            </a>

            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                        <i class="bi bi-speedometer2 d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}" class="nav-link text-white">
                        <i class="bi bi-people d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                        User
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.job.index') }}" class="nav-link text-white">
                        <i class="bi bi-briefcase d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                        Job
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.about.index') }}" class="nav-link text-white">
                        <i class="bi bi-box-seam d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                        About us
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.career.index') }}" class="nav-link text-white">
                        <i class="bi bi-collection d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                        Post
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.cv.index') }}" class="nav-link text-white">
                        <i class="bi bi-filter-square d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                        CV
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="nav-link text-white dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear d-block mx-auto mb-1 text-center" style="font-size:24px;"></i>
                        Setting
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item text-capitalize fw-bold" href="#"><i class="bi bi-person"></i> {{ Auth::user()->username }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.companyinfo.index') }}"><i class="bi bi-building"></i> Company Info.</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.homepage.index') }}"><i class="bi bi-images"></i> Slide <i class="bi bi-stars"></i>Partner</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.footer.index') }}"><i class="bi bi-sort-down"></i> Footer</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-power"></i> Logout</a></li>
                    </ul>

                </li>
            </ul>
        </div>
        </div>
    </div>
</header>

<!-- Center modal content -->
<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <form action="{{ route('changepassword') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header brand-bg4">
                <h4 class="modal-title text-white" id="myCenterModalLabel">Change Password</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="opassword">Current Password</label>
                    <input class="form-control" type="text" name="opassword">
                    <span class="text-danger">@error('opassword'){{$message}}@enderror</span>
                </div>
                <div class="form-group mb-3">
                    <label for="npassword">New Password</label>
                    <input class="form-control" type="text" name="npassword">
                    <span class="text-danger">@error('npassword'){{$message}}@enderror</span>
                </div>
                <div class="form-group mb-3">
                    <label for="vpassword">Verify Password</label>
                    <input class="form-control" type="text" name="vpassword">
                    <span class="text-danger">@error('vpassword'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn brand_btn4">Save</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->