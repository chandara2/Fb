@extends('layout.layout_admin')
@section('title', 'ADMIN JOB')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Jobs</h1>
        </div>
    </div>

    <!-- Add job modal start -->
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
    </div>
    <!-- Add job modal end -->

    <!-- Edit job modal start -->
    <div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="edit_job_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" id="job_id">
                    <div class="modal-body p-4 bg-light">
                        
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
                                    <input name="title_en" id="title_en" type="text" class="form-control">
                                </div>
                                <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                                    <input name="title_ch" id="title_ch" type="text" class="form-control">
                                </div>
                                <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                                    <input name="title_kh" id="title_kh" type="text" class="form-control">
                                </div>
                                <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                                    <input name="title_th" id="title_th" type="text" class="form-control">
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
                                    <select name="company_id" id="company_id" class="form-select">
                                        @foreach ($jobs as $company)
                                            <option value="{{ $company->id }}">{{ $company->company }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Function</label>
                                    <select name="function" id="function" class="form-select">
                                        @foreach ($job_functions as $job_function)
                                            <option value="{{ $job_function->function_en }}">{{ $job_function->function_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Industry</label>
                                    <select name="industry" id="industry" class="form-select">
                                        @foreach ($job_industries as $job_industry)
                                            <option value="{{ $job_industry->industry_en }}">{{ $job_industry->industry_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Location</label>
                                    <select name="location" id="location" class="form-select">
                                        @foreach ($job_locations as $job_location)
                                            <option value="{{ $job_location->location_en }}">{{ $job_location->location_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Salary</label>
                                    <select name="salary" id="salary" class="form-select">
                                        @foreach ($job_salaries as $job_salary)
                                            <option value="{{ $job_salary->salary_en }}">{{ $job_salary->salary_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Sex</label>
                                    <select name="sex" id="sex" class="form-select">
                                        @foreach ($job_genders as $job_gender)
                                            <option value="{{ $job_gender->gender_en }}">{{ $job_gender->gender_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Age</label>
                                    <input name="age" id="age" type="text" class="form-control">
                                    <span class="text-danger error-text age_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Term</label>
                                    <select name="term" id="term" class="form-select">
                                        @foreach ($job_terms as $job_term)
                                            <option value="{{ $job_term->term_en }}">{{ $job_term->term_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Level</label>
                                    <select name="level" id="level" class="form-select">
                                        @foreach ($job_levels as $job_level)
                                            <option value="{{ $job_level->level_en }}">{{ $job_level->level_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Qualification</label>
                                    <select name="qualification" id="qualification" class="form-select">
                                        @foreach ($job_qualifications as $job_qualification)
                                            <option value="{{ $job_qualification->qualification_en }}">{{ $job_qualification->qualification_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Language</label>
                                    <input name="language" id="language" type="text" class="form-control">
                                    <span class="text-danger error-text language_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Years of experience</label>
                                    <select name="year_of_exp" id="year_of_exp" class="form-select">
                                        @foreach ($job_experiences as $job_experience)
                                            <option value="{{ $job_experience->experience_en }}">{{ $job_experience->experience_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Hiring</label>
                                    <input name="hiring" id="hiring" type="number" class="form-control">
                                    <span class="text-danger error-text hiring_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact</label>
                                    <input name="contact" id="contact" type="text" class="form-control">
                                    <span class="text-danger error-text contact_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Expired Job</label>
                                    <input name="expired_job" id="expired_job" type="date" class="form-control">
                                    <span class="text-danger error-text expired_job_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Expired Post</label>
                                    <input name="expired_post" id="expired_post" type="date" class="form-control">
                                    <span class="text-danger error-text expired_post_error"></span>
                                </div>
                            </div>
                        </div> <!-- End row -->

                        <div class="form-group mb-md-3">
                            <label>Detail</label>
                            <textarea name="detail" id="detail" class="textarea_autosize form-control summernote">
                                @php
                                    // echo $jobs->detail
                                @endphp
                            </textarea>
                            <span class="text-danger error-text detail_error"></span>
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
    <!-- Edit job modal end -->

    <div class="card container px-0 shadow">
        <div class="card-header position-relative bg-primary">
            <h2 class="mb-0 text-white">List of users</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showJobModal" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New User</button>
        </div>
        <div class="card-body" id="show_all_jobs"></div>
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

            // Pending & Approved
            // $('.toggle-class').on('change', function() {
            //     var approved = $(this).prop('checked') == true ? 1 : 0;
            //     var id = $(this).data('id');
            //     $.ajax({
            //         type: 'GET',
            //         dataType: 'JSON',
            //         url: '/admin/changejobstatus',
            //         data: {
            //             'approved': approved,
            //             'id': id
            //         },  
            //         success:function(response) {
            //             console.log(response.successStatusMsg)
            //         }
            //     });
            // });

            // Save User Form
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
                    success: function (response) {
                        if(response.status==0){
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            jobfetch();
                            $('#showJobModal').modal('hide')
                            $('#addJobFormId')[0].reset();
                        }
                    }
                });
            });

            // Edit User ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('admin.jobedit') }}",
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#job_id").val(response.id);
                        $("#title_ch").val(response.title_ch);
                        $("#title_en").val(response.title_en);
                        $("#title_kh").val(response.title_kh);
                        $("#title_th").val(response.title_th);
                        $("#company_id").val(response.company);
                        $("#function").val(response.function);
                        $("#industry").val(response.industry);
                        $("#location").val(response.location);
                        $("#salary").val(response.salary);
                        $("#sex").val(response.sex);
                        $("#age").val(response.age);
                        $("#term").val(response.term);
                        $("#level").val(response.level);
                        $("#qualification").val(response.qualification);
                        $("#language").val(response.language);
                        $("#year_of_exp").val(response.year_of_exp);
                        $("#hiring").val(response.hiring);
                        $("#contact").val(response.contact);
                        $("#expired_job").val(response.expired_job);
                        $("#expired_post").val(response.expired_post);
                    }
                });
            });

            // Update User ajax request
            // $("#edit_job_form").submit(function(e) {
            //         e.preventDefault();
            //         const fd = new FormData(this);
            //         $("#edit_employee_btn").text('Updating...');
            //         $.ajax({
            //         url: "{{ route('admin.userupdate') }}",
            //         method: 'post',
            //         data: fd,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         dataType: 'json',
            //         success: function(response) {
            //             if (response.status == 200) {
            //             Swal.fire(
            //                 'Updated!',
            //                 'Employee Updated Successfully!',
            //                 'success'
            //             )
            //             jobfetch();
            //             $("#edit_employee_btn").text('Update User');
            //             $("#edit_job_form")[0].reset();
            //             $("#editJobModal").modal('hide');
            //             }else{
            //                 $.each(response.error, function(prefix, val){
            //                     $('span.'+prefix+'_error').text(val[0])
            //                 })
            //             }
                        
            //         }
            //     });
            // });

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
                            url: "{{ route('admin.jobdelete') }}",
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
                                jobfetch();
                            }
                        });
                    }
                })
            });

            // Fetch all User ajax request
            jobfetch();

            function jobfetch() {
                $.ajax({
                    url: "{{ route('admin.jobfetch') }}",
                    method: 'get',
                    success: function(response) {
                    $("#show_all_jobs").html(response);
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