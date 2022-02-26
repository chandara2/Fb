@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Users</h1>
        </div>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">User</li>
                <li class="breadcrumb-item" data-bs-toggle="modal" data-bs-target="#showUserModal">
                    <a href="#" class="text-decoration-none">New User</a>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Modal Add about info -->
    <div class="modal fade" id="showUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.user.store') }}" id="addUserFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <input name="fname" type="text" class="form-control" placeholder="Family Name">
                            <span class="text-danger error-text fname_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <input name="gname" type="text" class="form-control" placeholder="Family">
                            <span class="text-danger error-text gname_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                            <span class="text-danger error-text username_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                            <span class="text-danger error-text phone_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <input name="password" type="text" class="form-control" placeholder="Password">
                            <span class="text-danger error-text password_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <input name="password_confirmation" type="text" class="form-control" placeholder="Confirm Password">
                            <span class="text-danger error-text password_confirmation_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label>Group member</label>
                            <select name="gid" class="form-select">
                                @foreach ($usergroups as $usergroup)
                                    <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text gid_error"></span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end add modal -->

    <div class="container">
        @if (session('userdelete'))
            <div class="alert alert-success text-center fw-bold">{{session('userdelete')}}</div>
        @endif
        
        <table class="customdatatable table table-hover table-bordered" style="width:100%">
            <thead class="table-primary">
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
                        <a href="/admin/user/{{ $user->id }}/edit" title="Edit"><i class="bi bi-pencil-square text-primary"></i></a>
                        @if($user->gid!=1)
                        <form action="/admin/user/{{ $user->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" title="Delete" class="btn btn-sm"><i class="bi bi-trash text-danger"></i></button>
                        </form>
                        @else
                        <i class="bi bi-trash text-danger btn btn-sm" style="cursor: not-allowed;" title="Impossible to delete Admin!"></i>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
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

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Save Job Form
            $('#addUserFormId').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    method:$(this).attr('method'),
                    url:$(this).attr('action'),
                    data:new FormData(this),
                    dataType: "json",
                    processData:false,
                    contentType:false,
                    beforeSend: function(){
                        $(document).find('span.error-text').text('')
                    },
                    success: function (data) {
                        if(data.status==0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#addUserFormId')[0].reset()
                            $('#showUserModal').modal('hide')
                            document.location.href = "{{ route('admin.user.index') }}"
                        }
                    }
                });
            });
        }); 
    </script>
@endsection