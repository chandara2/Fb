@extends('layout.layout_app')
@section('title', 'AGENCY EDIT JOB')

@section('content')

<!-- Create User -->
    <div class="container-fluid mt-5">
        <form action="{{ route('agency.job.update', $jobid->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Edit job announcement</h1>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Job Title</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="job_title" value="{{ $jobid->job_title }}" autofocus class="form-control" placeholder="IT Programmer">
                    <span class="text-danger">@error('job_title'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Industry</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="job_industries" class="form-select">
                        <option value="{{ $jobid->industry }}">{{ $jobid->industry }}</option>
                        @foreach ($job_industries as $job_industry)
                            <option>{{ $job_industry->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('job_industries'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Function</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="job_function" class="form-select">
                        <option value="{{ $jobid->job_function }}">{{ $jobid->job_function }}</option>
                        @foreach ($job_functions as $job_function)
                            <option>{{ $job_function->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('job_function'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Salary</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="job_salary" value="{{ $jobid->job_salary }}" class="form-select">
                        <option selected disabled>Select Job Salary</option>
                        @foreach ($job_salaries as $job_salary)
                            <option>{{ $job_salary->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('job_salary'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Location</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="job_locations" value="{{ $jobid->job_locations }}" class="form-select">
                        <option selected disabled>Select Job Location</option>
                        @foreach ($job_locations as $job_location)
                            <option>{{ $job_location->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('job_locations'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Age</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="age" value="{{ $jobid->age }}" autofocus class="form-control" placeholder="18 - 35">
                    <span class="text-danger">@error('age'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Contact</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact" value="{{ $jobid->contact }}" autofocus class="form-control" placeholder="Phone / Email">
                    <span class="text-danger">@error('contact'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Deadline</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="deadline" value="{{ $jobid->deadline }}" autofocus class="form-control" onfocus="(this.type='date')" placeholder="Dec 31 2022">
                    <span class="text-danger">@error('deadline'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Hiring</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="hiring" value="{{ $jobid->hiring }}" autofocus class="form-control" placeholder="5">
                    <span class="text-danger">@error('hiring'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Language</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="language" value="{{ $jobid->language }}" autofocus class="form-control" placeholder="English - Good">
                    <span class="text-danger">@error('language'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Qualification</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="qualification" value="{{ $jobid->qualification }}" autofocus class="form-control" placeholder="Bachelor's degree">
                    <span class="text-danger">@error('qualification'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Sex</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="sex" value="{{ $jobid->sex }}" autofocus class="form-control" placeholder="Male / Female / Both">
                    <span class="text-danger">@error('sex'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Term</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="term" value="{{ $jobid->term }}" autofocus class="form-control" placeholder="Part time / Full time">
                    <span class="text-danger">@error('term'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Years of experience</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="year_of_exp" value="{{ $jobid->year_of_exp }}" autofocus class="form-control" placeholder="1 year">
                    <span class="text-danger">@error('year_of_exp'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Detail</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <div class="form-floating">
                        <textarea class="textarea_autosize form-control" name="detail">
                            {{ $jobid->detail }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('agency.job.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection