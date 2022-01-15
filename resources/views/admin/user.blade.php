@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal-new-user">New User</a></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        @if (session('userdelete'))
            <div class="alert alert-info">{{session('userdelete')}}</div>
        @endif
        
        <table class="custom_datatable table table-bordered table-hover" style="width:100%">
            <thead class="table-info text-center">
                <tr>
                    <th>No</th>
                    <th>Family Name</th>
                    <th>Given Name</th>
                    <th>Userame</th>
                    <th>Phone Number</th>
                    <th>Member</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i => $user)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$user->fname}}</td>
                    <td>{{$user->gname}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->phone}}</td>
                    @if($user->gid==1)
                    <td class="text-danger">Admin</td>
                    @elseif($user->gid==2)
                    <td>Agency</td>
                    @else
                    <td>User</td>
                    @endif
                    <td>
                        <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-sm"><i class="bi bi-pencil-square text-primary"></i>Edit</a>
                        @if($user->gid!=1)
                        <form action="/admin/user/{{ $user->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm"><i class="bi bi-trash text-danger"></i>Delete</button>
                        </form>
                        @else
                        <button class="btn btn-sm" style="cursor: not-allowed;" title="Impossible to delete Admin!"><i class="bi bi-trash"></i>Delete</button>
                        @endif
                        <a href="#">
                            <i class="bi bi-toggle-off"></i>
                            <i class="bi bi-toggle-on"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-info text-center">
                <tr>
                    <th>No</th>
                    <th>Family Name</th>
                    <th>Given Name</th>
                    <th>Userame</th>
                    <th>Phone Number</th>
                    <th>Member</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div>
    
<!-- Create User -->
    <div class="modal fade" id="modal-new-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="modal-header brand-bg4">
                        <h4 class="modal-title text-white" id="myCenterModalLabel">Create New User</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="px-3">
                        <input type="text" name="fname" value="{{ old('fname') }}" placeholder="Family Name" class="form-control mt-3" autofocus>
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

@endsection