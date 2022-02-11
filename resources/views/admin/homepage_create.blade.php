@extends('layout.layout_admin')
@section('title', 'ADMIN INFO')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Homepage</h1>
        </div>
    </div>

    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.homepage.store')}}">
            @csrf
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Create Slide</h1>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Homepage Slide</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="file" name="slide" value="{{ old('slide') }}" class="form-control" onchange="document.getElementById('homepageSlide').src = window.URL.createObjectURL(this.files[0])">
                    <img id="homepageSlide" width="110px">
                </div>
            </div>

            <div class="modal-footer">
                <a href="{{ route('admin.homepage.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection