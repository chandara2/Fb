@extends('layout.layout_admin')
@section('title', 'ADMIN JOB')

@section('content')

    <!-- Add job modal start -->
    <div class="modal fade" id="showJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Create Job Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.job.store') }}" id="addJobFormId">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
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
                        <div class="row my-2">
                            <div class="col-lg">
                                <label>Company</label>
                                <select name="company_id" class="form-select">
                                    <option selected disabled>Select Company</option>
                                    @foreach ($company_infos as $company_info)
                                        <option value="{{ $company_info->id }}">{{ $company_info->company }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text company_id_error"></span>  
                            </div>
                            <div class="col-lg">
                                <label>Function</label>
                                <select name="function" class="form-select">
                                    <option selected disabled>Select Job Function</option>
                                    @foreach ($job_functions as $job_function)
                                        <option>{{ $job_function->function_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text function_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label>Industry</label>
                                <select name="industry" class="form-select">
                                    <option selected disabled>Select Job Industry</option>
                                    @foreach ($job_industries as $job_industry)
                                        <option>{{ $job_industry->industry_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text industry_error"></span>  
                            </div>
                            <div class="col-lg">
                                <label>Location</label>
                                <select name="location" class="form-select">
                                    <option selected disabled>Select Job Location</option>
                                    @foreach ($job_locations as $job_location)
                                        <option>{{ $job_location->location_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text location_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label>Salary</label>
                                <select name="salary" class="form-select">
                                    <option selected disabled>Select Job Salary</option>
                                    @foreach ($job_salaries as $job_salary)
                                        <option>{{ $job_salary->salary_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text salary_error"></span>  
                            </div>
                            <div class="col-lg">
                                <label>Sex</label>
                                <select name="sex" class="form-select">
                                    <option selected disabled>Select Job Gender</option>
                                    @foreach ($job_genders as $job_gender)
                                        <option>{{ $job_gender->gender_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text sex_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label for="fname">Age</label>
                                <input type="text" name="age" class="form-control">
                                <span class="text-danger error-text age_error"></span>  
                            </div>
                            <div class="col-lg">
                                <label>Term</label>
                                <select name="term" class="form-select">
                                    <option selected disabled>Select Job Term</option>
                                    @foreach ($job_terms as $job_term)
                                        <option>{{ $job_term->term_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text term_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label>Level</label>
                                <select name="level" class="form-select">
                                    <option selected disabled>Select Job Level</option>
                                    @foreach ($job_levels as $job_level)
                                        <option>{{ $job_level->level_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text level_error"></span>
                            </div>
                            <div class="col-lg">
                                <label>Qualification</label>
                                <select name="qualification" class="form-select">
                                    <option selected disabled>Select Job Qualification</option>
                                    @foreach ($job_qualifications as $job_qualification)
                                        <option>{{ $job_qualification->qualification_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text qualification_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label>Language</label>
                                <input type="text" name="language" class="form-control">
                                <span class="text-danger error-text language_error"></span>
                            </div>
                            <div class="col-lg">
                                <label>Years of experience</label>
                                <select name="year_of_exp" class="form-select">
                                    <option selected disabled>Select Job Experiences</option>
                                    @foreach ($job_experiences as $job_experience)
                                        <option>{{ $job_experience->experience_en }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text year_of_exp_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label>Hiring</label>
                                <input type="number" name="hiring" class="form-control">
                                <span class="text-danger error-text hiring_error"></span>
                            </div>
                            <div class="col-lg">
                                <label>Contact</label>
                                <input type="text" name="contact" class="form-control">
                                <span class="text-danger error-text contact_error"></span>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-lg">
                                <label>Expired Job</label>
                                <input type="text" name="expired_job" class="form-control" onfocus="(this.type='date')" placeholder="Jan 31 2022">
                                <span class="text-danger error-text expired_job_error"></span>
                            </div>
                            <div class="col-lg">
                                <label>Expired Post</label>
                                <input type="text" name="expired_post" class="form-control" onfocus="(this.type='date')" placeholder="Jan 31 2022">
                                <span class="text-danger error-text expired_post_error"></span>
                            </div>
                        </div>
                        <div class="my-2">
                            <label>Detail</label>
                            <textarea name="detail" class="form-control summernote"></textarea>
                            <span class="text-danger error-text detail_error"></span>
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
    <!-- Add job modal end -->

    <div class="card container mt-5 px-0 shadow">
        <div class="card-header position-relative bg-light">
            <h2 class="mb-0 text-primary">List of jobs</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showJobModal" class="btn btn-primary position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New Job</button>
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

            // Delete Job ajax request
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

            // Fetch all Job ajax request
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