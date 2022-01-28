@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT ABOUT')

@section('content')

<div class="container-fluid">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info bg-opacity-50">
            <h5 class="modal-title" id="exampleModalLabel">Edit About us Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <label>Mission</label>
                        <textarea name="mission" name="edit_mission" class="textarea_autosize form-control">{{ $abouts_id->mission }}</textarea>
                        <span class="text-danger">@error('mission'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>Goal</label>
                        <textarea name="goal" name="edit_goal" class="textarea_autosize form-control">{{ $abouts_id->goal }}</textarea>
                        <span class="text-danger">@error('goal'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>Value</label>
                        <textarea name="value" name="edit_value" class="textarea_autosize form-control">{{ $abouts_id->value }}</textarea>
                        <span class="text-danger">@error('value'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>Email</label>
                        <input name="email" name="edit_email" type="email" class="form-control" value="{{ $abouts_id->email }}">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>Phone</label>
                        <input name="phone" name="edit_phone" type="text" class="form-control" value="{{ $abouts_id->phone }}">
                        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>Address</label>
                        <input name="address" name="edit_address" type="text" class="form-control" value="{{ $abouts_id->address }}">
                        <span class="text-danger">@error('address'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>Social Media</label>
                        <input name="social" name="edit_social" type="text" class="form-control" value="{{ $abouts_id->social }}">
                        <span class="text-danger">@error('social'){{$message}}@enderror</span>
                    </div>
            
                    <div class="form-group mb-md-3">
                        <label>Operating</label>
                        <input name="operating" name="edit_operating" type="text" class="form-control" placeholder="Day&time" value="{{ $abouts_id->operating }}">
                        <span class="text-danger">@error('operating'){{$message}}@enderror</span>
                    </div>
            
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

