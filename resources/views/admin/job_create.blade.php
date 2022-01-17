@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')

<!-- Create User -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.job.store') }}" method="POST">
                @csrf
                <div class="modal-header brand-bg4">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Create New Job</h4>
                    <a href="{{ route('admin.job.index') }}">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                </div>
                <div class="px-3">
                    <input type="text" name="age" value="{{ old('age') }}" placeholder="Age" class="form-control mt-3" autofocus>
                    <span class="text-danger">@error('age'){{$message}}@enderror</span>
                    <input type="text" name="contact" value="{{ old('contact') }}" placeholder="Contact" class="form-control mt-3">
                    <span class="text-danger">@error('contact'){{$message}}@enderror</span>
                    <input type="text" name="deadline" value="{{ old('deadline') }}" placeholder="Deadline" class="form-control mt-3" onfocus="(this.type='date')">
                    <span class="text-danger">@error('deadline'){{$message}}@enderror</span>
                    <input type="text" name="detail" value="{{ old('detail') }}" placeholder="Detail" class="form-control mt-3">
                    <span class="text-danger">@error('detail'){{$message}}@enderror</span>
                    <input type="number" name="hiring" value="{{ old('hiring') }}" placeholder="Hiring" class="form-control mt-3">
                    <span class="text-danger">@error('hiring'){{$message}}@enderror</span>
                    <select name="job_industries" value="{{ old('job_industries') }}" class="form-select mt-3" >
                        <option selected>-- Select Job Industry --</option>
                        @foreach ($job_industries as $job_industry)
                            <option>{{ $job_industry->name }}</option>
                        @endforeach
                    </select>
                    <select name="job_function" value="{{ old('job_function') }}" class="form-select mt-3" >
                        <option selected>-- Select Job Function --</option>
                        @foreach ($job_functions as $job_function)
                            <option>{{ $job_function->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="job_title" value="{{ old('job_title') }}" placeholder="Job Title" class="form-control mt-3">
                    <span class="text-danger">@error('job_title'){{$message}}@enderror</span>
                    <input type="text" name="language" value="{{ old('language') }}" placeholder="Language" class="form-control mt-3">
                    <span class="text-danger">@error('language'){{$message}}@enderror</span>
                    <select name="job_industries" value="{{ old('job_industries') }}" class="form-select mt-3" >
                        <option selected>-- Select Job Industry --</option>
                        @foreach ($job_industries as $job_industry)
                            <option>{{ $job_industry->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="qualification" value="{{ old('qualification') }}" placeholder="Qualification" class="form-control mt-3">
                    <span class="text-danger">@error('qualification'){{$message}}@enderror</span>
                    <select name="job_locations" value="{{ old('job_locations') }}" class="form-select mt-3" >
                        <option selected>-- Select Job Location --</option>
                        @foreach ($job_locations as $job_location)
                            <option>{{ $job_location->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="sex" value="{{ old('sex') }}" placeholder="Sex" class="form-control mt-3">
                    <span class="text-danger">@error('sex'){{$message}}@enderror</span>
                    <input type="text" name="term" value="{{ old('term') }}" placeholder="Term" class="form-control mt-3">
                    <span class="text-danger">@error('term'){{$message}}@enderror</span>
                    <input type="number" name="year_of_exp" value="{{ old('year_of_exp') }}" placeholder="Years of experience" class="form-control mt-3" max="100">
                    <span class="text-danger">@error('year_of_exp'){{$message}}@enderror</span>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.user.index') }}">
                        <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                    </a>
                    <button type="submit" class="btn brand_btn4">Create</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

@endsection