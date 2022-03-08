@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Users</h1>
        </div>
    </div>

    <!-- Add user modal start -->
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
                            <input name="gname" type="text" class="form-control" placeholder="Given Name">
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
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <span class="text-danger error-text password_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
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
    <!-- Add user modal end -->

    <!-- Edit user modal start -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit user modal end -->

    <div class="card container px-0 shadow">
        <div class="card-header position-relative bg-primary">
            <h2 class="mb-0 text-white">List of users</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showUserModal" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New User</button>
        </div>
        <div class="card-body" id="show_all_users"></div>
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

            // Save User Form
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
                            userfetch();
                            $('#showUserModal').modal('hide')
                            $('#addUserFormId')[0].reset();
                        }
                    }
                });
            });

            // Edit User ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                console.log(id)
                $.ajax({
                    url: "{{ route('admin.edituser') }}",
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#fname").val(response.fname);
                        $("#gname").val(response.gname);
                        $("#username").val(response.username);
                        $("#phone").val(response.phone);
                        $("#password").val('********');
                        $("#user_id").val(response.id);
                        $("#gid").val(response.gid);
                    }
                });
            });

            // Update User ajax request
            $("#edit_employee_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_employee_btn").text('Updating...');
                    $.ajax({
                    url: "{{ route('admin.updateuser') }}",
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Employee Updated Successfully!',
                            'success'
                        )
                        userfetch();
                        $("#edit_employee_btn").text('Update User');
                        $("#edit_employee_form")[0].reset();
                        $("#editUserModal").modal('hide');
                        }else{
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }
                        
                    }
                });
            });

            // Delete User ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url: "{{ route('admin.deleteuser') }}",
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            userfetch();
                        }
                        });
                    }
                })
            });

            // Fetch all User ajax request
            userfetch();

            function userfetch() {
                $.ajax({
                    url: "{{ route('admin.userfetch') }}",
                    method: 'get',
                    success: function(response) {
                    $("#show_all_users").html(response);
                    $("table").DataTable({
                        order: [0, 'asc'],
                        pageLength: 25,
                    });
                    }
                });
            }

        });
    </script>
@endsection