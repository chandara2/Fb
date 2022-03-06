@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT ABOUT')

@section('content')

<div class="container-fluid">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLabel">Edit About us Information</h5>
            <a href="{{ route('admin.about.index') }}"><button type="button" class="btn-close"></button></a>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.about.update', $abouts_id->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-md-3">
                        <label>About Us Banner</label>
                        <input name="banner" type="file" class="form-control" onchange="document.getElementById('output_banner').src = window.URL.createObjectURL(this.files[0])">
                        <img src="{{ asset('upload/aboutsbanner/'.$abouts_id->banner) }}" id="output_banner" width="256" class="img-thumbnail" style="max-height: 128px; object-fit: cover;">
                        <span class="text-danger">@error('banner'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>About info. Chinese</label>
                        <textarea class="textarea_autosize form-control summernote" name="aboutus_ch">
                            @php
                                echo $abouts_id->aboutus_ch
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('aboutus_ch'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-md-3">
                        <label>About info. English</label>
                        <textarea class="textarea_autosize form-control summernote" name="aboutus_en">
                            @php
                                echo $abouts_id->aboutus_en
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('aboutus_en'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-md-3">
                        <label>About info. Khmer</label>
                        <textarea class="textarea_autosize form-control summernote" name="aboutus_kh">
                            @php
                                echo $abouts_id->aboutus_kh
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('aboutus_kh'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-md-3">
                        <label>About info. Thai</label>
                        <textarea class="textarea_autosize form-control summernote" name="aboutus_th">
                            @php
                                echo $abouts_id->aboutus_th
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('aboutus_th'){{$message}}@enderror</span>
                    </div>
            
                    <div class="modal-footer">
                        <a href="{{ route('admin.about.index') }}"><button type="button" class="btn btn-secondary">Close</button></a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

