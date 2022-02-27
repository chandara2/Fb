@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT CAREER')

@section('content')

<div class="container-fluid">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info bg-opacity-50">
            <h5 class="modal-title" id="exampleModalLabel">Edit Career Resourece</h5>
            <a href="{{ route('admin.career.index') }}"><button type="button" class="btn-close"></button></a>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.career.update', $career_id->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-md-3">
                        <label>Type</label>
                        <select name="type" class="form-select">
                            <option>{{ $career_id->type }}</option>
                            @foreach ($postgroups as $type)
                                <option>{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('type'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group mb-md-3">
                        <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" href="#nav-en" role="tab" aria-controls="nav-en" aria-selected="true">English</a>
                            <a class="nav-link" id="nav-ch-tab" data-bs-toggle="tab" href="#nav-ch" role="tab" aria-controls="nav-ch" aria-selected="false">Chinese</a>
                            <a class="nav-link" id="nav-kh-tab" data-bs-toggle="tab" href="#nav-kh" role="tab" aria-controls="nav-kh" aria-selected="false">Khmer</a>
                            <a class="nav-link" id="nav-th-tab" data-bs-toggle="tab" href="#nav-th" role="tab" aria-controls="nav-th" aria-selected="false">Thai</a>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                <div class="form-group mb-md-3">
                                    <label class="mt-3">Title</label>
                                    <input type="text" name="title_en" value="{{ $career_id->title_en }}" class="form-control">
                                        <span class="text-danger">@error('title_en'){{$message}}@enderror</span>
                                    <label class="mt-3 d-block">Artical</label>
                                    <textarea class="textarea_autosize form-control summernote" name="post_en">
                                        @php
                                            echo $career_id->post_en
                                        @endphp
                                    </textarea>
                                    <span class="text-danger">@error('post_en'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                                <div class="form-group mb-md-3">
                                    <label class="mt-3">Title</label>
                                    <input type="text" name="title_ch" value="{{ $career_id->title_ch }}" class="form-control">
                                        <span class="text-danger">@error('title_ch'){{$message}}@enderror</span>
                                    <label class="mt-3 d-block">Artical</label>
                                    <textarea class="textarea_autosize form-control summernote" name="post_ch">
                                        @php
                                            echo $career_id->post_ch
                                        @endphp
                                    </textarea>
                                    <span class="text-danger">@error('post_ch'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                                <div class="form-group mb-md-3">
                                    <label class="mt-3">Title</label>
                                    <input type="text" name="title_kh" value="{{ $career_id->title_kh }}" class="form-control">
                                        <span class="text-danger">@error('title_kh'){{$message}}@enderror</span>
                                    <label class="mt-3 d-block">Artical</label>
                                    <textarea class="textarea_autosize form-control summernote" name="post_kh">
                                        @php
                                            echo $career_id->post_kh
                                        @endphp
                                    </textarea>
                                    <span class="text-danger">@error('post_kh'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                                <div class="form-group mb-md-3">
                                    <label class="mt-3">Title</label>
                                    <input type="text" name="title_th" value="{{ $career_id->title_th }}" class="form-control">
                                        <span class="text-danger">@error('title_th'){{$message}}@enderror</span>
                                    <label class="mt-3 d-block">Artical</label>
                                    <textarea class="textarea_autosize form-control summernote" name="post_th">
                                        @php
                                            echo $career_id->post_th
                                        @endphp
                                    </textarea>
                                    <span class="text-danger">@error('post_th'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="modal-footer">
                        <a href="{{ route('admin.career.index') }}"><button type="button" class="btn btn-secondary">Close</button></a>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

