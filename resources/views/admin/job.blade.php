@extends('layout.layout_admin')
@section('title', 'ADMIN JOB')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Jobs</h1>
        </div>
    </div>

    <!-- Modal Add Job -->
    <div class="modal fade" id="showJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Create Job Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.job.store') }}" id="addJobFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Job Title</label>
                            <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" href="#nav-en" role="tab" aria-controls="nav-en" aria-selected="true">English</a>
                                <a class="nav-link" id="nav-ch-tab" data-bs-toggle="tab" href="#nav-ch" role="tab" aria-controls="nav-ch" aria-selected="false">Chinese</a>
                                <a class="nav-link" id="nav-kh-tab" data-bs-toggle="tab" href="#nav-kh" role="tab" aria-controls="nav-kh" aria-selected="false">Khmer</a>
                                <a class="nav-link" id="nav-th-tab" data-bs-toggle="tab" href="#nav-th" role="tab" aria-controls="nav-th" aria-selected="false">Thai</a>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                    <input name="title_en" type="text" class="form-control">
                                </div>
                                <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                                    <input name="title_ch" type="text" class="form-control">
                                </div>
                                <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                                    <input name="title_kh" type="text" class="form-control">
                                </div>
                                <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                                    <input name="title_th" type="text" class="form-control">
                                </div>
                            </div>
                            <ul class="ps-0" style="list-style: none;">
                                <li><span class="text-danger error-text title_ch_error"></span></li>
                                <li><span class="text-danger error-text title_en_error"></span></li>
                                <li><span class="text-danger error-text title_kh_error"></span></li>
                                <li><span class="text-danger error-text title_th_error"></span></li>
                            </ul>
                        </div>

                        <div class="row"> <!--Row Input -->
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Company</label>
                                    <select name="company_id" value="{{ old('company_id') }}" class="form-select">
                                        <option selected disabled>Select Company</option>
                                        @foreach ($company_infos as $company_info)
                                            <option value="{{ $company_info->id }}">{{ $company_info->company }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text company_id_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Function</label>
                                    <select name="function" value="{{ old('function') }}" class="form-select">
                                        <option selected disabled>Select Job Function</option>
                                        @foreach ($job_functions as $job_function)
                                            <option>{{ $job_function->function_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text function_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Industry</label>
                                    <select name="industry" value="{{ old('industry') }}" class="form-select">
                                        <option selected disabled>Select Job Industry</option>
                                        @foreach ($job_industries as $job_industry)
                                            <option>{{ $job_industry->industry_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text industry_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Location</label>
                                    <select name="location" value="{{ old('location') }}" class="form-select">
                                        <option selected disabled>Select Job Function</option>
                                        @foreach ($job_locations as $job_location)
                                            <option>{{ $job_location->location_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text location_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Salary</label>
                                    <select name="salary" value="{{ old('salary') }}" class="form-select">
                                        <option selected disabled>Select Job Salary</option>
                                        @foreach ($job_salaries as $job_salary)
                                            <option>{{ $job_salary->salary_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text salary_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Sex</label>
                                    <select name="sex" value="{{ old('sex') }}" class="form-select">
                                        <option selected disabled>Select Job Gender</option>
                                        @foreach ($job_genders as $job_gender)
                                            <option>{{ $job_gender->gender_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text sex_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Age</label>
                                    <input name="age" type="text" class="form-control" placeholder="Age Unlimited / 20 ~ 35">
                                    <span class="text-danger error-text age_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Term</label>
                                    <select name="term" value="{{ old('term') }}" class="form-select">
                                        <option selected disabled>Select Job Term</option>
                                        @foreach ($job_terms as $job_term)
                                            <option>{{ $job_term->term_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text term_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Level</label>
                                    <select name="level" value="{{ old('level') }}" class="form-select">
                                        <option selected disabled>Select Job Level</option>
                                        @foreach ($job_levels as $job_level)
                                            <option>{{ $job_level->level_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text level_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Qualification</label>
                                    <select name="qualification" value="{{ old('qualification') }}" class="form-select">
                                        <option selected disabled>Select Job Qualification</option>
                                        @foreach ($job_qualifications as $job_qualification)
                                            <option>{{ $job_qualification->qualification_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text qualification_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Language</label>
                                    <input name="language" type="text" class="form-control">
                                    <span class="text-danger error-text language_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Years of experience</label>
                                    <select name="year_of_exp" value="{{ old('year_of_exp') }}" class="form-select">
                                        <option selected disabled>Select Job Experiences</option>
                                        @foreach ($job_experiences as $job_experience)
                                            <option>{{ $job_experience->experience_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text year_of_exp_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Hiring</label>
                                    <input name="hiring" type="number" class="form-control">
                                    <span class="text-danger error-text hiring_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact</label>
                                    <input name="contact" type="text" class="form-control">
                                    <span class="text-danger error-text contact_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Expired Job</label>
                                    <input name="expired_job" type="text" onfocus="(this.type='date')" placeholder="Dec 31 2022" class="form-control">
                                    <span class="text-danger error-text expired_job_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Expired Post</label>
                                    <input name="expired_post" type="text" onfocus="(this.type='date')" placeholder="Dec 31 2023" class="form-control">
                                    <span class="text-danger error-text expired_post_error"></span>
                                </div>
                            </div>
                        </div> <!-- End row -->

                        <div class="form-group mb-md-3">
                            <label>Detail</label>
                            <textarea name="detail" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text detail_error"></span>
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="card container px-0 shadow">
        <div class="card-header position-relative bg-primary">
            <h2 class="mb-0 text-white">List of jobs</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showJobModal" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New Job</button>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                @if (session('userdelete'))
                    <div class="alert alert-success">{{session('userdelete')}}</div>
                @endif
                
                <table id="update_status_switch" class="customdatatable table table-hover table-bordered" style="width:100%">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Expired Post</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $i => $job)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$job->title_en}}</td>
                            <td>{{$job->company}}</td>
                            <td>
                                @if ($job->expired_post<now())
                                    <span class="text-danger" title="Will be deleted the next day">{{  date('d \\ M Y', strtotime($job->expired_post)) }}</span>
                                @else
                                    {{  date('d \\ M Y', strtotime($job->expired_post)) }}
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" class="toggle-class" data-id="{{ $job->id }}" data-toggle="toggle"  data-offstyle="danger" data-on="Approved" data-off="Pending" {{ $job->approved == true ? 'checked' : ''}}>
                                
                            </td>
                            <td>
                                <a href="/admin/job/{{ $job->id }}/edit" title="Edit"><i class="bi bi-pencil-square text-primary" style="font-size: 20px;"></i></a>
                                <form action="/admin/job/{{ $job->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm text-danger" title="Delete"><i class="bi bi-trash" style="font-size: 20px;"></i></button>
                                </form>
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
            $('#addJobFormId').on('submit', function (e) {
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
                            $('#addJobFormId')[0].reset()
                            $('#showJobModal').modal('hide')
                            document.location.href = "{{ route('admin.job.index') }}"
                        }
                    }
                });
            });

            
            // Pending & Approved
            $('.toggle-class').on('change', function() {
                var approved = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    dataType: 'JSON',
                    url: '/admin/changejobstatus',
                    data: {
                        'approved': approved,
                        'id': id
                    },
                    success:function(data) {
                        console.log(data.successStatusMsg)
                    }
                });
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
                $.ajax({
                    url: "{{ route('admin.useredit') }}",
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
                    url: "{{ route('admin.userupdate') }}",
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
                    if(gid!=1){
                        if (result.isConfirmed) {
                            $.ajax({
                            url: "{{ route('admin.userdelete') }}",
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
                    }else{
                        Swal.fire(
                            'Admin!',
                            'You can not delete admin account.',
                        )
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