@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Users</h1>
        </div>
    </div>

    <!-- Modal Add user -->
    <div class="modal fade" id="showUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
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
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end add modal -->

    <div class="card container px-0 shadow">
        <div class="card-header position-relative bg-primary">
            <h2 class="mb-0 text-white">List of users</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showUserModal" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New User</button>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                @if (session('userdelete'))
                    <div class="alert alert-success text-center fw-bold">{{session('userdelete')}}</div>
                @endif
                
                <table class="customdatatable table table-striped table-bordered" style="width:100%">
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
                        <tr id="sid">
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
                                <a href="/admin/user/{{ $user->id }}/edit" title="Edit"><i class="bi bi-pencil-square text-primary" style="font-size: 20px;"></i></a>
                                @if($user->gid!=1)
                                <form action="/admin/user/{{ $user->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Delete" class="btn btn-sm"><i class="bi bi-trash text-danger" style="font-size: 20px;"></i></button>
                                </form>
                                @else
                                <i class="bi bi-trash text-danger btn btn-sm" style="cursor: not-allowed; font-size: 20px;" title="Impossible to delete Admin!"></i>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        
            </div>
        </div>
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
                    success: function (response) {
                        if(response.status==0){
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#showUserModal').modal('hide')
                            $('#addUserFormId')[0].reset();
                            // document.location.href = "{{ route('admin.user.index') }}"
                        }
                    }
                });
            });
        }); 
    </script>
@endsection