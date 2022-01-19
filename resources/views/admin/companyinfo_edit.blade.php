@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT USER')

@section('content')

    <div class="container-fluid mt-5">
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.companyinfo.update', $companyinfos->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Company name</label>
                <div class="col-md-6">
                    <input type="text" name="company" value="{{ $companyinfos->company }}" autofocus class="form-control">
                    <span class="text-danger">@error('company'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Industry</label>
                <div class="col-md-6">
                    <input type="text" name="industry" value="{{ $companyinfos->industry }}" class="form-control">
                    <span class="text-danger">@error('industry'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Number of staff</label>
                <div class="col-md-6">
                    <input type="text" name="number_staff" value="{{ $companyinfos->number_staff }}" class="form-control">
                    <span class="text-danger">@error('number_staff'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Website</label>
                <div class="col-md-6">
                    <input type="url" name="website" value="{{ $companyinfos->website }}" placeholder="https://example.com" class="form-control">
                    <span class="text-danger">@error('website'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Province/City</label>
                <div class="col-md-6">
                    <input type="text" name="province" value="{{ $companyinfos->province }}" class="form-control">
                    <span class="text-danger">@error('province'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Detail Location</label>
                <div class="col-md-6">
                    <input type="text" name="detail_location" value="{{ $companyinfos->detail_location }}" class="form-control">
                    <span class="text-danger">@error('detail_location'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Company Profile</label>
                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea class="textarea_autosize form-control" name="company_profile">
                            {{ $companyinfos->company_profile }}
                        </textarea>
                        <span class="text-danger">@error('company_profile'){{$message}}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Company Logo</label>
                <div class="col-md-6">                 
                    <input type="file" name="logo" class="form-control" value="{{ $companyinfos->logo }}" onchange="document.getElementById('companylogo').src = window.URL.createObjectURL(this.files[0])">
                    <img id="companylogo" width="110px" src="{{ asset('upload/companylogo/'.$companyinfos->logo) }}">
                    <span class="text-danger">@error('logo'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="h5 text-info text-uppercase col-md-4 text-md-end">Contact Information</div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Name</label>
                <div class="col-md-6">
                    <input type="text" name="contact_name" value="{{ $companyinfos->contact_name }}" class="form-control">
                    <span class="text-danger">@error('contact_name'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Position</label>
                <div class="col-md-6">
                    <input type="text" name="contact_position" value="{{ $companyinfos->contact_position }}" class="form-control">
                    <span class="text-danger">@error('contact_position'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Email</label>
                <div class="col-md-6">
                    <input type="email" name="contact_email" value="{{ $companyinfos->contact_email }}" class="form-control">
                    <span class="text-danger">@error('contact_email'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-md-4 col-form-label text-md-end">Contact Phone</label>
                <div class="col-md-6">
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