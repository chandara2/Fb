@extends('layout.layout_user')
@section('title', 'SUPERVISOR USER')

@section('content_user')

    <div id="show_user_profile"></div>

    <!-- Edit profile modal start -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_profile_form" enctype="multipart/form-data">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_profile_btn" class="btn btn-success">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit profile modal end -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Edit profile ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('user.useredit') }}",
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#user_id").val(response.id);
                        $("#fname").val(response.fname);
                        $("#gname").val(response.gname);
                        $("#username").val(response.username);
                        $("#phone").val(response.phone);
                        $("#password").val('********');
                    }
                });
            });

            // Update profile ajax request
            $("#edit_profile_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_profile_btn").text('Updating...');
                    $.ajax({
                    url: "{{ route('user.userupdate') }}",
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
                        userfetch();
                        $("#edit_profile_btn").text('Update Profile');
                        $("#edit_profile_form")[0].reset();
                        $("#editProfileModal").modal('hide');
                        }else{
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }
                        
                    }
                });
            });

            // Fetch profile ajax request
            userfetch();

            function userfetch() {
                $.ajax({
                    url: "{{ route('user.userfetch') }}",
                    method: 'get',
                    success: function(response) {
                        $("#show_user_profile").html(response);
                    }
                });
            }

        });
    </script>
@endsection