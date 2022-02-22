@extends('layout.layout_admin')
@section('title', 'ADMIN JOB')

@section('content')

    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Jobs</h1>
        </div>
    </div>

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Job</li>
                <li class="breadcrumb-item">
                    @if (auth()->user()!=null && $company_infos->isEmpty()) <a href="{{ route('admin.companyinfo.index') }}" class="text-decoration-none">New Job</a>
                    @else <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#showJobModal">New Job</a>
                    @endif
                </li>
            </ol>
        </nav>
    </div>

    <!-- Modal Add about info -->
    <div class="modal fade" id="showJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Create Job Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.job.store') }}" id="addJobFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Job Title</label>
                            {{-- <input name="title" type="text" class="form-control"> --}}

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

                        <div class="form-group mb-md-3">
                            <label>Company</label>
                            <select name="company_id" value="{{ old('company_id') }}" class="form-select">
                                <option selected disabled>Select Company</option>
                                @foreach ($company_infos as $company_info)
                                    <option value="{{ $company_info->id }}">{{ $company_info->company }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text company_error"></span>
                        </div>

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

                        <div class="form-group mb-md-3">
                            <label>Sex</label>
                            <input name="sex" type="text" class="form-control">
                            <span class="text-danger error-text sex_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Age</label>
                            <input name="age" type="text" class="form-control">
                            <span class="text-danger error-text age_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Term</label>
                            <input name="term" type="text" class="form-control">
                            <span class="text-danger error-text term_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Qualification</label>
                            <input name="qualification" type="text" class="form-control">
                            <span class="text-danger error-text qualification_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Language</label>
                            <input name="language" type="text" class="form-control">
                            <span class="text-danger error-text language_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Years of experience</label>
                            <input name="year_of_exp" type="text" class="form-control">
                            <span class="text-danger error-text year_of_exp_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Hiring</label>
                            <input name="hiring" type="text" class="form-control">
                            <span class="text-danger error-text hiring_error"></span>
                        </div>


                        <div class="form-group mb-md-3">
                            <label>Contact</label>
                            <input name="contact" type="text" class="form-control">
                            <span class="text-danger error-text contact_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Expired Job</label>
                            <input name="expired_job" type="text" onfocus="(this.type='date')" placeholder="Dec 31 2022" class="form-control">
                            <span class="text-danger error-text expired_job_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Expired Post</label>
                            <input name="expired_post" type="text" onfocus="(this.type='date')" placeholder="Dec 31 2023" class="form-control">
                            <span class="text-danger error-text expired_post_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Detail</label>
                            <textarea name="detail" class="textarea_autosize form-control"></textarea>
                            <span class="text-danger error-text detail_error"></span>
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

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
                        <input type="checkbox" class="toggle-class" data-id="{{ $job->id }}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Approved" data-off="Pending" {{ $job->approved == true ? 'checked' : ''}}>

                        {{-- <input data-id="{{ $job->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approved" data-off="Pending" {{ $job->approved ? 'checked' : ''}}> --}}
                    </td>
                    <td>
                        <a href="/admin/job/{{ $job->id }}/edit" title="Edit"><i class="bi bi-pencil-square text-primary"></i></a>
                        <form action="/admin/job/{{ $job->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="#" title="Detail"><i class="bi bi-eye text-success"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Expired Post</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div> <!-- end container-fluid -->

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
        // $(function(){
        //     $('.toggle-class').change(function(){
        //         var approved = $(this).prop('checked') == true ? 1:0;
        //         var id = $(this).data('id');
        //         $.ajax({
        //             type: "GET",
        //             dataType: "json",
        //             url: "/admin/changejobstatus",
        //             data: {'approved': approved, 'id': id},
        //             success: function (data) {
        //                 console.log('Success');
        //             }
        //         });
        //     });
        // });
        
    </script>
@endsection