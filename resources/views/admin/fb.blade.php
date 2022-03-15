@extends('layout.layout')
@section('title', 'ADMIN FB')

@section('content')

    <div class="card container-fluid mt-3 px-0 shadow">
        <div class="card-header position-relative bg-light">
            <h2 class="mb-0 text-primary">List of FB</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showFbModal" class="btn btn-primary position-absolute end-0 top-50 translate-middle-y me-3"><i class='bx bx-message-square-add' ></i> Add New FB</button>
        </div>
        <div class="card-body" id="show_all_fbs"></div>
    </div>

    <!-- Add fb modal start TEST123 -->
    <div class="modal fade" id="showFbModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Create FB</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.fb.store') }}" id="addFbFormId">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control">
                                <span class="text-danger error-text date_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="create_by">Create By</label>
                                <select name="create_by" class="form-select">
                                    <option selected disabled>Please select creator</option>
                                    @foreach ($users as $user)
                                        <option>{{ $user->username }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text create_by_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="status">Status</label>
                                <select name="status" class="form-select">
                                    <option selected disabled>Please select status</option>
                                    @foreach ($statuses as $status)
                                        <option>{{ $status->status }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" class="form-control">
                                <span class="text-danger error-text fname_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="sname">Surname</label>
                                <input type="text" name="sname" class="form-control">
                                <span class="text-danger error-text sname_error"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="email_pw">Email Password</label>
                            <input type="text" name="email_pw" class="form-control">
                            <span class="text-danger error-text email_pw_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="fb_id">Facebook ID</label>
                            <input type="text" name="fb_id" class="form-control">
                            <span class="text-danger error-text fb_id_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="fb_pw">Facebook Password</label>
                            <input type="text" name="fb_pw" class="form-control">
                            <span class="text-danger error-text fb_pw_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="twofa">2FA</label>
                            <input type="text" name="twofa" class="form-control">
                            <span class="text-danger error-text twofa_error"></span>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="friends">Friends</label>
                                <input type="number" name="friends" class="form-control">
                                <span class="text-danger error-text friends_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="country">Country</label>
                                <select name="country" class="form-select">
                                    <option selected disabled>Please select country</option>
                                    @foreach ($countrys as $country)
                                        <option>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text country_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="visa">Visa</label>
                            <input type="text" name="visa" class="form-control">
                            <span class="text-danger error-text visa_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="visa_date">Visa Date</label>
                            <input type="date" name="visa_date" class="form-control">
                            <span class="text-danger error-text visa_date_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="boost_by">Boost By</label>
                                <select name="boost_by" class="form-select">
                                    <option selected disabled>Please select booster</option>
                                    @foreach ($users as $user)
                                        <option>{{ $user->username }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text boost_by_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="boost_date">Boost Date</label>
                            <input type="date" name="boost_date" class="form-control">
                            <span class="text-danger error-text boost_date_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add fb modal end -->

    <!-- Edit fb modal start -->
    <div class="modal fade" id="editFbModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_fb_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="facebook_id" id="facebook_id">
                    <div class="modal-body p-4 bg-light">
                        <div class="row">
                            <div class="col-lg">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control">
                                <span class="text-danger error-text date_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="create_by">Create By</label>
                                <select name="create_by" id="create_by" class="form-select">
                                    @foreach ($users as $user)
                                        <option>{{ $user->username }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text create_by_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-select">
                                    @foreach ($statuses as $status)
                                        <option>{{ $status->status }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control">
                                <span class="text-danger error-text fname_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="sname">Surname</label>
                                <input type="text" name="sname" id="sname" class="form-control">
                                <span class="text-danger error-text sname_error"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="email_pw">Email Password</label>
                            <input type="text" name="email_pw" id="email_pw" class="form-control">
                            <span class="text-danger error-text email_pw_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="fb_id">Facebook ID</label>
                            <input type="text" name="fb_id" id="fb_id" class="form-control">
                            <span class="text-danger error-text fb_id_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="fb_pw">Facebook Password</label>
                            <input type="text" name="fb_pw" id="fb_pw" class="form-control">
                            <span class="text-danger error-text fb_pw_error"></span>
                        </div>
                        <div class="my-2">
                            <label for="twofa">2FA</label>
                            <input type="text" name="twofa" id="twofa" class="form-control">
                            <span class="text-danger error-text twofa_error"></span>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="friends">Friends</label>
                                <input type="number" name="friends" id="friends" class="form-control">
                                <span class="text-danger error-text friends_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-select">
                                    @foreach ($countrys as $country)
                                        <option>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text country_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="visa">Visa</label>
                            <input type="text" name="visa" id="visa" class="form-control">
                            <span class="text-danger error-text visa_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="visa_date">Visa Date</label>
                            <input type="date" name="visa_date" id="visa_date" class="form-control">
                            <span class="text-danger error-text visa_date_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="boost_by">Boost By</label>
                                <select name="boost_by" id="boost_by" class="form-select">
                                    @foreach ($users as $user)
                                        <option>{{ $user->username }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text boost_by_error"></span>
                            </div>
                            <div class="col-lg">
                                <label for="boost_date">Boost Date</label>
                            <input type="date" name="boost_date" id="boost_date" class="form-control">
                            <span class="text-danger error-text boost_date_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="edit_fb_btn" class="btn btn-success">Update Fb</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit fb modal end -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Save Fb Form
            $('#addFbFormId').on('submit', function (e) {
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
                            fbfetch();
                            $('#showFbModal').modal('hide')
                            $('#addFbFormId')[0].reset();
                        }
                    }
                });
            });

            // Edit Fb ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('admin.fbedit') }}",
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#facebook_id").val(response.id);
                        $("#date").val(response.date);
                        $("#create_by").val(response.create_by);
                        $("#status").val(response.status);
                        $("#fname").val(response.fname);
                        $("#sname").val(response.sname);
                        $("#email").val(response.email);
                        $("#email_pw").val(response.email_pw);
                        $("#fb_id").val(response.fb_id);
                        $("#fb_pw").val(response.fb_pw);
                        $("#twofa").val(response.twofa);
                        $("#friends").val(response.friends);
                        $("#country").val(response.country);
                        $("#visa").val(response.visa);
                        $("#visa_date").val(response.visa_date);
                        $("#boost_by").val(response.boost_by);
                        $("#boost_date").val(response.boost_date);
                    }
                });
            });

            // Update User ajax request
            $("#edit_fb_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_fb_btn").text('Updating...');
                    $.ajax({
                    url: "{{ route('admin.fbupdate') }}",
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
                            'Fb Updated Successfully!',
                            'success'
                        )
                        fbfetch();
                        $("#edit_fb_btn").text('Update Post');
                        $("#edit_fb_form")[0].reset();
                        $("#editFbModal").modal('hide');
                        }else{
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }
                        
                    }
                });
            });

            // Delete Fb ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let gid = $(this).val();
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
                            url: "{{ route('admin.fbdelete') }}",
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
                                fbfetch();
                            }
                        });
                    }
                })
            });

            // Fetch all Fb ajax request
            fbfetch();

            function fbfetch() {
                $.ajax({
                    url: "{{ route('admin.fbfetch') }}",
                    method: 'get',
                    success: function(response) {
                    $("#show_all_fbs").html(response);
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