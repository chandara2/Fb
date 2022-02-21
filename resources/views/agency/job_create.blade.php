@extends('layout.layout_app')
@section('title', 'AGENCY CREATE JOB')

@section('content')

<!-- Create User -->
    <div class="container-fluid mt-5">
        <form action="{{ route('agency.job.store') }}" method="POST">
            @csrf
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Create new job announcement</h1>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Job Title</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="title" value="{{ old('title') }}" autofocus class="form-control" placeholder="IT Programmer">
                    <span class="text-danger">@error('title'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Industry</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="industry" class="form-select">
                        @foreach ($job_industries as $job_industry)
                            <option @if (old('industry') == $job_industry->industry_en) selected @endif>{{ $job_industry->industry_en }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('industry'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Function</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="function" class="form-select">
                        @foreach ($job_functions as $job_function)
                            <option @if (old('function') == $job_function->function_en) selected @endif>{{ $job_function->function_en }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('function'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Salary</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="salary" class="form-select">
                        @foreach ($job_salaries as $job_salary)
                            <option @if (old('salary') == $job_salary->salary_en) selected @endif>{{ $job_salary->salary_en }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('salary'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Select Job Location</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="location" class="form-select">
                        @foreach ($job_locations as $job_location)
                            <option @if (old('location') == $job_location->location_en) selected @endif>{{ $job_location->location_en }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">@error('location'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Sex</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="sex" value="{{ old('sex') }}" autofocus class="form-control" placeholder="Male / Female / Both">
                    <span class="text-danger">@error('sex'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Age</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="age" value="{{ old('age') }}" autofocus class="form-control" placeholder="18 - 35">
                    <span class="text-danger">@error('age'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Term</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="term" value="{{ old('term') }}" autofocus class="form-control" placeholder="Part time / Full time">
                    <span class="text-danger">@error('term'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Qualification</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="qualification" value="{{ old('qualification') }}" autofocus class="form-control" placeholder="Bachelor's degree">
                    <span class="text-danger">@error('qualification'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Language</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="language" value="{{ old('language') }}" autofocus class="form-control" placeholder="English - Good">
                    <span class="text-danger">@error('language'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Years of experience</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="year_of_exp" value="{{ old('year_of_exp') }}" autofocus class="form-control" placeholder="1 year">
                    <span class="text-danger">@error('year_of_exp'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Hiring</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="hiring" value="{{ old('hiring') }}" autofocus class="form-control" placeholder="5">
                    <span class="text-danger">@error('hiring'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Contact</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact" value="{{ old('contact') }}" autofocus class="form-control" placeholder="Phone / Email">
                    <span class="text-danger">@error('contact'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Expired Job</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="expired_job" value="{{ old('expired_job') }}" autofocus class="form-control" onfocus="(this.type='date')" placeholder="Dec 31 2022">
                    <span class="text-danger">@error('expired_job'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Expired Post</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="expired_post" value="{{ old('expired_post') }}" autofocus class="form-control" onfocus="(this.type='date')" placeholder="Dec 31 2022">
                    <span class="text-danger">@error('expired_post'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Detail</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <div class="form-floating">
                        <textarea class="textarea_autosize form-control" name="detail">
                            {{ old('detail') }}
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