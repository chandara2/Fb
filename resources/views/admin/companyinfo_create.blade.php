@extends('layout.layout_admin')
@section('title', 'ADMIN CREATE USER')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Company Information</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.companyinfo.store')}}">
            @csrf
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Company name</label>
                <div class="col-md-6">
                    <input type="text" name="company" value="{{ old('company') }}" autofocus class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Industry</label>
                <div class="col-md-6">
                    <input type="text" name="industry" value="{{ old('industry') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Number of staff</label>
                <div class="col-md-6">
                    <input type="text" name="number_staff" value="{{ old('number_staff') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Website</label>
                <div class="col-md-6">
                    <input type="url" name="website" value="{{ old('website') }}" placeholder="https://example.com" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Province/City</label>
                <div class="col-md-6">
                    <input type="text" name="province" value="{{ old('province') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Detail Location</label>
                <div class="col-md-6">
                    <input type="text" name="detail_location" value="{{ old('detail_location') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Company Profile</label>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="textarea_autosize form-control" name="company_profile">
                            {{ old('company_profile') }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Company Logo</label>
                <div class="col-md-6">
                    <input type="file" name="logo" value="{{ old('logo') }}" class="form-control" onchange="document.getElementById('companyinfologo').src = window.URL.createObjectURL(this.files[0])">
                    <img id="companyinfologo" width="110px">
                </div>
            </div>
            <div class="h5 text-info text-uppercase col-md-4 text-md-end">Contact Information</div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Name</label>
                <div class="col-md-6">
                    <input type="text" name="contact_name" value="{{ old('contact_name') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Position</label>
                <div class="col-md-6">
                    <input type="text" name="contact_position" value="{{ old('contact_position') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Email</label>
                <div class="col-md-6">
                    <input type="email" name="contact_email" value="{{ old('contact_email') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Phone</label>
                <div class="col-md-6">
                    <input type="text" name="contact_phone" value="{{ old('contact_phone') }}" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ route('admin.job.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection