@extends('layout.layout')
@section('title', 'ADMIN USER')

@section('content')

    <div class="container-fluid mt-3 px-0">
        <div id="show_profile"></div>
    </div>


    <!-- Edit user modal start -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_profile_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="profile_id" id="profile_id">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_profile_btn" class="btn btn-success">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit user modal end -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Edit User ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('admin.profileedit') }}",
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#profile_id").val(response.id);
                        $("#fname").val(response.fname);
                        $("#gname").val(response.gname);
                        $("#username").val(response.username);
                        $("#phone").val(response.phone);
                        $("#password").val('********');
                    }
                });
            });

            // Update User ajax request
            $("#edit_profile_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_profile_btn").text('Updating...');
                    $.ajax({
                    url: "{{ route('admin.profileupdate') }}",
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
                            'Profile Updated Successfully!',
                            'success'
                        )
                        profilefetch();
                        $("#edit_profile_btn").text('Update Profile');
                        $("#edit_profile_form")[0].reset();
                        $("#editUserModal").modal('hide');
                        }else{
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }
                        
                    }
                });
            });

            // Fetch all User ajax request
            profilefetch();

            function profilefetch() {
                $.ajax({
                    url: "{{ route('admin.profilefetch') }}",
                    method: 'get',
                    success: function(response) {
                    $("#show_profile").html(response);
                    }
                });
            }

        });
    </script>
@endsection