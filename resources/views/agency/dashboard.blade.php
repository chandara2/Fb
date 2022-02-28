@extends('layout.layout_app')
@section('title', 'AGENCY DB')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Agency</li>
                @if (auth()->user()!=null && $company_infos->isNotEmpty())
                <li class="breadcrumb-item"><a href="{{ route('agency.job.index') }}" class="text-decoration-none">Job List</a></li>
                @endif
                <li class="breadcrumb-item"><a href="#" data-bs-toggle="modal" data-bs-target="#showJobModal" class="text-decoration-none">New Job</a>
                </li>
                @if (auth()->user()!=null && $company_infos->isEmpty())
                    <li class="breadcrumb-item"><a href="#" data-bs-toggle="modal" data-bs-target="#showCompanyModal" class="text-decoration-none">New Company</a></li>
                @endif
            </ol>
        </nav>
    </div>

    @if (auth()->user()!=null && $company_infos->isEmpty())
        <div class="text-center text-primary alert alert-info">Please make company first before create new job</div>
    @endif

    <!-- Modal Add company info -->
    <div class="modal fade" id="showCompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Create Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('agency.companyinfo.store') }}" id="addCompanyFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Company name</label>
                            <input name="company" type="text" class="form-control">
                            <span class="text-danger error-text company_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Industry</label>
                            <select name="industry" value="{{ old('industry') }}" class="form-select">
                                <option selected disabled>Select Company Industry</option>
                                @foreach ($job_industrys as $job_industry)
                                    <option>{{ $job_industry->industry_en }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text industry_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Number of staff</label>
                            <input name="number_staff" type="text" class="form-control">
                            <span class="text-danger error-text number_staff_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Website</label>
                            <input name="website" type="text" class="form-control">
                            <span class="text-danger error-text website_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Province/City</label>
                            <select name="province" value="{{ old('province') }}" class="form-select">
                                <option selected disabled>Select Company Province</option>
                                @foreach ($job_locations as $location)
                                    <option>{{ $location->location_en }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text province_error"></span>
                        </div>


                        <div class="form-group mb-md-3">
                            <label>Detail Location</label>
                            <input name="detail_location" type="text" class="form-control">
                            <span class="text-danger error-text detail_location_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Company Profile</label>
                            <textarea name="company_profile" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text company_profile_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Company Logo</label>
                            <input name="logo" type="file" class="form-control" value="{{ old('logo') }}" onchange="document.getElementById('companyinfologo').src = window.URL.createObjectURL(this.files[0])">
                            <img id="companyinfologo" width="110px">
                            <span class="text-danger error-text company_profile_error"></span>
                        </div>

                        <div class="h5 text-info text-center text-uppercase">Contact Information</div>

                        <div class="row"> <!-- Row Contact -->
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Name</label>
                                    <input name="contact_name" type="text" class="form-control">
                                    <span class="text-danger error-text contact_name_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Position</label>
                                    <input name="contact_position" type="text" class="form-control">
                                    <span class="text-danger error-text contact_position_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Email</label>
                                    <input name="contact_email" type="text" class="form-control">
                                    <span class="text-danger error-text contact_email_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Phone</label>
                                    <input name="contact_phone" type="text" class="form-control">
                                    <span class="text-danger error-text contact_phone_error"></span>
                                </div>
                            </div>
                        </div> <!-- End row -->
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <!-- Modal Add Job -->
    <div class="modal fade" id="showJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Create Job Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('agency.job.store') }}" id="addJobFormId">
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
                                        @foreach ($job_industrys as $job_industry)
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
                                        @foreach ($job_salarys as $job_salary)
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
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Agency Dashboard</h1>
        </div>
    </div>

    <div class="container">
        <div id="wrap_agency_profile" class="position-relative">
            @foreach ($company_infos as $company_info)
            <div class="row py-5 brand-bg5">
                <div class="col-md-2">
                    <img src="{{asset('upload/companylogo/')}}/{{$company_info->logo}}" alt="logo here" class="me-3" width="100%" height="auto" style="max-width: 150px;">
                </div>
                <div class="col-md-10">
                    <div class="h2">{{$company_info->company}}</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">{{$company_info->number_staff}}</li>
                            <li class="breadcrumb-item">{{$company_info->industry}}</li>
                            <li class="breadcrumb-item">{{$company_info->province}}</li>
                        </ol>
                        <p class="h1">15</p>
                        <div>Active Jobs</div>
                    </nav>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="h5">Company Profile</div>
                    @php
                        echo $company_info->company_profile
                    @endphp
                    {{-- <textarea disabled class="textarea_autosize form-control border-0 bg-light px-0">{{$company_info->company_profile}}</textarea> --}}
                    <br>
                    <div class="h5">Location</div>
                    <p>{{$company_info->detail_location}}</p>
                    <br>
                    <div class="h5">Contact Information</div>
                    <img src="{{asset('asset/image/programmer.png')}}" alt="" width="65" class="mb-2">
                    <div><i class="bi bi-phone-vibrate"></i>&nbsp;{{$company_info->contact_phone}}</div>
                    <div><i class="bi bi-envelope"></i>&nbsp;{{$company_info->contact_email}}</div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0">
                <a href="/agency/companyinfo/{{ $company_info->id }}/edit"><i class="bi bi-pencil-square btn text-muted pe-0" style="font-size:24px;"></i></a>
            </div>
            @endforeach
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

            // Save Company Form
            $('#addCompanyFormId').on('submit', function (e) {
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
                            $('#addCompanyFormId')[0].reset()
                            $('#showCompanyModal').modal('hide')
                            document.location.href = "{{ route('agency.dashboard') }}"
                        }
                    }
                });
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
                            document.location.href = "{{ route('agency.dashboard') }}"
                        }
                    }
                });
            });

        }); 
    </script>
@endsection