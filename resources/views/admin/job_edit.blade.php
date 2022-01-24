@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT JOB')

@section('content')

<!-- Create User -->
    <div class="container-fluid mt-5">
        <form action="{{ route('admin.job.update', $jobid->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Create new job announcement</h1>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Job Title</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="title" value="{{ $jobid->title }}" autofocus class="form-control" placeholder="IT Programmer">
                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Select Job Industry</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="industry" class="form-select">
                        <option value="{{ $jobid->industry }}">{{ $jobid->industry }}</option>
                        @foreach ($job_industries as $job_industry)
                            <option>{{ $job_industry->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('industry'){{$message}}@enderror</span>
                </div>
            </div>    
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Select Job Function</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="function" class="form-select">
                        <option value="{{ $jobid->industry }}">{{ $jobid->function }}</option>
                        @foreach ($job_functions as $job_function)
                            <option>{{ $job_function->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('function'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Select Job Salary</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="salary" class="form-select">
                        <option value="{{ $jobid->salary }}">{{ $jobid->salary }}</option>
                        @foreach ($job_salaries as $job_salary)
                            <option>{{ $job_salary->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('salary'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Select Job Location</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="location" class="form-select">
                        <option value="{{ $jobid->location }}">{{ $jobid->location }}</option>
                        @foreach ($job_locations as $job_location)
                            <option>{{ $job_location->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('location'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Sex</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="sex" value="{{ $jobid->sex }}" autofocus class="form-control" placeholder="Male / Female / Both">
                    <span class="text-danger">@error('sex'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Age</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="age" value="{{ $jobid->age }}" autofocus class="form-control" placeholder="18 - 35">
                    <span class="text-danger">@error('age'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Term</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="term" value="{{ $jobid->term }}" autofocus class="form-control" placeholder="Part time / Full time">
                    <span class="text-danger">@error('term'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Qualification</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="qualification" value="{{ $jobid->qualification }}" autofocus class="form-control" placeholder="Bachelor's degree">
                    <span class="text-danger">@error('qualification'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Language</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="language" value="{{ $jobid->language }}" autofocus class="form-control" placeholder="English - Good">
                    <span class="text-danger">@error('language'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Years of experience</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="year_of_exp" value="{{ $jobid->year_of_exp }}" autofocus class="form-control" placeholder="1 year">
                    <span class="text-danger">@error('year_of_exp'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Hiring</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="hiring" value="{{ $jobid->hiring }}" autofocus class="form-control" placeholder="5">
                    <span class="text-danger">@error('hiring'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact" value="{{ $jobid->contact }}" autofocus class="form-control" placeholder="Phone / Email">
                    <span class="text-danger">@error('contact'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Expired Job</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="expired_job" value="{{ $jobid->expired_job }}" autofocus class="form-control" onfocus="(this.type='date')" placeholder="Dec 31 2022">
                    <span class="text-danger">@error('expired_job'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Expired Post</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="expired_post" value="{{ $jobid->expired_post }}" autofocus class="form-control" onfocus="(this.type='date')" placeholder="Dec 31 2022">
                    <span class="text-danger">@error('expired_post'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Detail</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <div class="form-floating">
                        <textarea class="textarea_autosize form-control" name="detail">
                            {{ $jobid->detail }}
                        </textarea>
                    </div>
                    <span class="text-danger">@error('detail'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.job.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection