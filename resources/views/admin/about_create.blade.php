@extends('layout.layout_admin')
@section('title', 'ABOUT')

@section('content')

<div class="container-fluid">
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.about.store') }}">
        @csrf
        <h1 class="text-center text-uppercase mt-3 mb-5" style="text-decoration: underline 3px solid pink">About Us Information</h1>
        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-xl-3 col-md-2 col-form-label text-md-end pb-0 pb-0">About Us Banner</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <input name="banner" type="file" class="form-control" value="{{ old('banner') }}" onchange="document.getElementById('output_banner').src = window.URL.createObjectURL(this.files[0])">
                <img id="output_banner" width="110px">
                <span class="text-danger">@error('banner'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Mission</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <div class="form-floating">
                    <textarea name="mission" class="textarea_autosize form-control" placeholder="Leave a comment here">
                        {{ old('mission') }}</textarea>
                    <label for="mission">Description</label>
                    <span class="text-danger">@error('mission'){{$message}}@enderror</span>
                </div>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Goal</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <div class="form-floating">
                    <textarea name="goal" class="textarea_autosize form-control" placeholder="Leave a comment here">
                        {{ old('goal') }}</textarea>
                    <label for="goal">Description</label>
                    <span class="text-danger">@error('goal'){{$message}}@enderror</span>
                </div>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Value</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <div class="form-floating">
                    <textarea name="value" class="textarea_autosize form-control" placeholder="Leave a comment here">
                        {{ old('value') }}</textarea>
                    <label for="value">Description</label>
                    <span class="text-danger">@error('value'){{$message}}@enderror</span>
                </div>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Email</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Phone</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <input name="phone" type="text" class="form-control" value="{{ old('phone') }}">
                <span class="text-danger">@error('phone'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Address</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <input name="address" type="text" class="form-control" value="{{ old('address') }}">
                <span class="text-danger">@error('address'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Social Media</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <input name="social" type="text" class="form-control" value="{{ old('social') }}">
                <span class="text-danger">@error('social'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="form-group row mb-md-3">
            <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Operating</label>
            <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                <input name="operating" type="text" class="form-control" value="{{ old('operating') }}">
                <span class="text-danger">@error('operating'){{$message}}@enderror</span>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
    
@endsection

