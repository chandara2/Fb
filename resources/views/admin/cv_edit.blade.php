@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT CV')

@section('content')

    <div class="container-fluid mt-5">
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.cv.update', $cvid->id)}}">
            @csrf
            @method('PUT')
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Edit CV</h1>

            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">CV Profile</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">                 
                    <input type="file" name="photo" class="form-control" value="{{ $cvid->photo }}" onchange="document.getElementById('cvprofile').src = window.URL.createObjectURL(this.files[0])">
                    <img id="cvprofile" width="110px" src="{{ asset('upload/cvprofile/'.$cvid->photo) }}">
                    <span class="text-danger">@error('photo'){{$message}}@enderror</span>
                </div>
            </div>

            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Position Apply</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="position_apply" value="{{ $cvid->position_apply }}" class="form-control">
                    <span class="text-danger">@error('position_apply'){{$message}}@enderror</span>
                </div>
            </div>

            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Sex</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="sex" class="form-select">
                        <option>{{ $cvid->sex }}</option>
                        @foreach ($sexs as $sex)
                            <option>{{ $sex->gender_en }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-danger">@error('sex'){{$message}}@enderror</span>
            </div>

            <div class="modal-footer">
                <a href="/admin/cv/{{ $cvid->id }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection