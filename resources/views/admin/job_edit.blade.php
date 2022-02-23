@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT JOB')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('admin.job.update', $jobid->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Create new job announcement</h1>

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
                        <input name="title_en" value="{{ $jobid->title_en }}" type="text" class="form-control">
                    </div>
                    <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                        <input name="title_ch" value="{{ $jobid->title_ch }}" type="text" class="form-control">
                    </div>
                    <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                        <input name="title_kh" value="{{ $jobid->title_kh }}" type="text" class="form-control">
                    </div>
                    <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                        <input name="title_th" value="{{ $jobid->title_th }}" type="text" class="form-control">
                    </div>
                </div>
                <ul class="ps-0" style="list-style: none;">
                    <li><span class="text-danger">@error('title_ch'){{$message}}@enderror</span></li>
                    <li><span class="text-danger">@error('title_en'){{$message}}@enderror</span></li>
                    <li><span class="text-danger">@error('title_kh'){{$message}}@enderror</span></li>
                    <li><span class="text-danger">@error('title_th'){{$message}}@enderror</span></li>
                </ul>
            </div>
            <div class="form-group mb-md-3">
                <label>Company</label>
                <select name="company_id" class="form-select">
                    @foreach ($currentcom as $ccom)
                        @if($ccom->ccomid == $jobid->company_id)
                            <option>{{ $ccom->company }}</option>
                        @endif
                    @endforeach
                    @foreach ($company_infos as $company)
                        <option value="{{ $company->id }}">{{ $company->company }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('company_id'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Function</label>
                <select name="function" class="form-select">
                    <option>{{ $jobid->function }}</option>
                    @foreach ($job_functions as $function)
                        <option>{{ $function->function_en }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('function'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Industry</label>
                <select name="industry" class="form-select">
                    <option>{{ $jobid->industry }}</option>
                    @foreach ($job_industries as $industry)
                        <option>{{ $industry->industry_en }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('industry'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Location</label>
                <select name="location" class="form-select">
                    <option>{{ $jobid->location }}</option>
                    @foreach ($job_locations as $location)
                        <option>{{ $location->location_en }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('location'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Salary</label>
                <select name="salary" class="form-select">
                    <option>{{ $jobid->salary }}</option>
                    @foreach ($job_salaries as $salary)
                        <option>{{ $salary->salary_en }}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('salary'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Sex</label>
                <input name="sex" type="text" value="{{ $jobid->sex }}" class="form-control">
                <span class="text-danger">@error('sex'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Age</label>
                <input name="age" type="text" value="{{ $jobid->age }}" class="form-control">
                <span class="text-danger">@error('age'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Term</label>
                <input name="term" type="text" value="{{ $jobid->term }}" class="form-control">
                <span class="text-danger">@error('term'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Qualification</label>
                <input name="qualification" type="text" value="{{ $jobid->qualification }}" class="form-control">
                <span class="text-danger">@error('qualification'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Language</label>
                <input name="language" type="text" value="{{ $jobid->language }}" class="form-control">
                <span class="text-danger">@error('language'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Years of exp</label>
                <input name="year_of_exp" type="text" value="{{ $jobid->year_of_exp }}" class="form-control">
                <span class="text-danger">@error('year_of_exp'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Hiring</label>
                <input name="hiring" type="text" value="{{ $jobid->hiring }}" class="form-control">
                <span class="text-danger">@error('hiring'){{$message}}@enderror</span>
            </div>
                
                
            <div class="form-group mb-md-3">
                <label>Contact</label>
                <input name="contact" type="text" value="{{ $jobid->contact }}" class="form-control">
                <span class="text-danger">@error('contact'){{$message}}@enderror</span>
            </div>
                
            <div class="form-group mb-md-3">
                <label>Expired Job</label>
                <input name="expired_job" type="date" value="{{ $jobid->expired_job }}"  placeholder="Dec 31 2022" class="form-control">
                <span class="text-danger">@error('expired_job'){{$message}}@enderror</span>
            </div>
    
            <div class="form-group mb-md-3">
                <label>Expired Post</label>
                <input name="expired_post" type="date" value="{{ $jobid->expired_post }}" placeholder="Dec 31 2023" class="form-control">
                <span class="text-danger">@error('expired_post'){{$message}}@enderror</span>
            </div>
    
            <div class="form-group mb-md-3">
                <label>Detail</label>
                <textarea name="detail" class="textarea_autosize form-control">{{ $jobid->detail }}</textarea>
                <span class="text-danger">@error('detail'){{$message}}@enderror</span>
            </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"><a href="{{ route('admin.job.index') }}" class="text-decoration-none text-white">Close</a></button>
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </form>
    </div>
@endsection