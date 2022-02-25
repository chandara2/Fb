@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT FOOTER CONTACT')

@section('content')

<div class="container-fluid">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info bg-opacity-50">
            <h5 class="modal-title" id="exampleModalLabel">Edit Footer Contact</h5>
            <a href="{{ route('admin.footer.index') }}"><button type="button" class="btn-close"></button></a>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.footer.update', $footercontact->id) }}">
                    @csrf
                    @method('PUT')
                    
            
                    <div class="form-group mb-md-3">
                        <label>Footer contact in Chinese</label>
                        <textarea class="textarea_autosize form-control summernote" name="contact_ch">
                            @php
                                echo $footercontact->contact_ch
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('contact_ch'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-md-3">
                        <label>Footer contact in English</label>
                        <textarea class="textarea_autosize form-control summernote" name="contact_en">
                            @php
                                echo $footercontact->contact_en
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('contact_en'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-md-3">
                        <label>Footer contact in Khmer</label>
                        <textarea class="textarea_autosize form-control summernote" name="contact_kh">
                            @php
                                echo $footercontact->contact_kh
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('contact_kh'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-md-3">
                        <label>Footer contact in Thai</label>
                        <textarea class="textarea_autosize form-control summernote" name="contact_th">
                            @php
                                echo $footercontact->contact_th
                            @endphp
                        </textarea>
                        <span class="text-danger">@error('contact_th'){{$message}}@enderror</span>
                    </div>
            
                    <div class="modal-footer">
                        <a href="{{ route('admin.footer.index') }}"><button type="button" class="btn btn-secondary">Close</button></a>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

