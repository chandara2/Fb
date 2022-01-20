@extends('layout.layout_app')
@section('title', 'AGENCY CREATE INFO')

@section('content')
    <div class="alert alert-info text-center" role="alert">
        Let us know the details of your company before job announcement.
    </div>
    
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('agency.dashboard') }}" class="text-decoration-none">Agency</a></li>
                <li class="breadcrumb-item active" aria-current="page">Company Information</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{route('agency.companyinfo.store')}}">
            @csrf
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">company information</h1>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Company name</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="company" value="{{ old('company') }}" autofocus class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Industry</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="industry" value="{{ old('industry') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Number of staff</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="number_staff" value="{{ old('number_staff') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Website</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="url" name="website" value="{{ old('website') }}" placeholder="https://example.com" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Province/City</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="province" value="{{ old('province') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Detail Location</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="detail_location" value="{{ old('detail_location') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Company Profile</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <div class="form-floating">
                        <textarea class="textarea_autosize form-control" name="company_profile">
                            {{ old('company_profile') }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Company Logo</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="file" name="logo" value="{{ old('logo') }}" class="form-control" onchange="document.getElementById('companyinfologo').src = window.URL.createObjectURL(this.files[0])">
                    <img id="companyinfologo" width="110px">
                </div>
            </div>
            <div class="h5 text-info text-center text-uppercase">Contact Information</div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Name</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact_name" value="{{ old('contact_name') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Position</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact_position" value="{{ old('contact_position') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Email</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="email" name="contact_email" value="{{ old('contact_email') }}" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Phone</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact_phone" value="{{ old('contact_phone') }}" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ route('agency.dashboard') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection