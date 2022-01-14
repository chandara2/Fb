@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')

    <div class="container-fluid">
        <!-- Create User -->
            <div class="modal fade" id="modal-new-user" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('admin.createnewuser') }}" method="POST">
                            @csrf
                            <div class="modal-header brand-bg4">
                                <h4 class="modal-title text-white" id="myCenterModalLabel">Create New User</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="px-3">
                                <input type="text" name="fname" value="{{ $usersid->fname }}" placeholder="Family Name" class="form-control mt-3" autofocus>
                                <input type="text" name="gname" value="{{ old('gname') }}" placeholder="Given Name" class="form-control mt-3">
                                <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control mt-3">
                                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="form-control mt-3">
                                <input type="text" name="password" placeholder="Password" class="form-control mt-3">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                <input type="text" name="password_confirmation" placeholder="Confirm Password" class="form-control mt-3">
                                <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                                <select name="gid" class="form-select my-3">
                                    <option value="3">User</option>
                                    <option value="2">Agency</option>
                                    <option value="1">Admin</option>
                                </select>
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
    </div>
    
@endsection