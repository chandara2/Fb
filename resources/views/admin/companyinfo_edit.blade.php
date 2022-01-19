@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT USER')

@section('content')

    <div class="container-fluid mt-5">
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.companyinfo.update', $companyinfos->id)}}">
            @csrf
            @method('PUT')
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Edit company information</h1>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Company name</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="company" value="{{ $companyinfos->company }}" autofocus class="form-control">
                    <span class="text-danger">@error('company'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Industry</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="industry" value="{{ $companyinfos->industry }}" class="form-control">
                    <span class="text-danger">@error('industry'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Number of staff</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="number_staff" value="{{ $companyinfos->number_staff }}" class="form-control">
                    <span class="text-danger">@error('number_staff'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Website</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="url" name="website" value="{{ $companyinfos->website }}" placeholder="https://example.com" class="form-control">
                    <span class="text-danger">@error('website'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Province/City</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="province" value="{{ $companyinfos->province }}" class="form-control">
                    <span class="text-danger">@error('province'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Detail Location</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="detail_location" value="{{ $companyinfos->detail_location }}" class="form-control">
                    <span class="text-danger">@error('detail_location'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Company Profile</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <div class="form-floating">
                        <textarea class="textarea_autosize form-control" name="company_profile">
                            {{ $companyinfos->company_profile }}
                        </textarea>
                        <span class="text-danger">@error('company_profile'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Company Logo</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">                 
                    <input type="file" name="logo" class="form-control" value="{{ $companyinfos->logo }}" onchange="document.getElementById('companylogo').src = window.URL.createObjectURL(this.files[0])">
                    <img id="companylogo" width="110px" src="{{ asset('upload/companylogo/'.$companyinfos->logo) }}">
                    <span class="text-danger">@error('logo'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="h5 text-info text-uppercase text-center my-3">Contact Information</div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Name</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact_name" value="{{ $companyinfos->contact_name }}" class="form-control">
                    <span class="text-danger">@error('contact_name'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Position</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact_position" value="{{ $companyinfos->contact_position }}" class="form-control">
                    <span class="text-danger">@error('contact_position'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Email</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="email" name="contact_email" value="{{ $companyinfos->contact_email }}" class="form-control">
                    <span class="text-danger">@error('contact_email'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-sm-0">Contact Phone</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="contact_phone" value="{{ $companyinfos->contact_phone }}" class="form-control">
                    <span class="text-danger">@error('contact_phone'){{$message}}@enderror</span>
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ route('admin.companyinfo.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection