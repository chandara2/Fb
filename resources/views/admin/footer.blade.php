@extends('layout.layout_admin')
@section('title', 'ADMIN FOOTRR')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Footer</h1>
        </div>
    </div>

    <div class="container"> <!-- Breadcrumb list -->
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Footer</li>
                @if ($footercontact->isEmpty())
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#showFooterContactModal">Add Contact</a>
                    </li>
                @endif
                <li class="breadcrumb-item">
                    <button class="btn btn-sm btn-primary mb-3 w-auto" data-bs-toggle="modal" data-bs-target="#showFooterSmModal"><i class="bi bi-plus-circle"></i> Add New Social Media</button>
                </li>
                <li class="breadcrumb-item">
                    <button class="btn btn-sm btn-primary mb-3 w-auto" data-bs-toggle="modal" data-bs-target="#showFooterQrcodeModal"><i class="bi bi-plus-circle"></i> Add New Qrcode</button>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Modal Add Footer contact info -->
    <div class="modal fade" id="showFooterContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Create Footer Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.footer.store') }}" id="addFooterContactFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label class="text-primary">Contact Detail in Chinese</label>
                            <textarea name="contact_ch" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text contact_ch_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label class="text-primary">Contact Detail in English</label>
                            <textarea name="contact_en" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text contact_en_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label class="text-primary">Contact Detail in Khmer</label>
                            <textarea name="contact_kh" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text contact_kh_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label class="text-primary">Contact Detail in Thai</label>
                            <textarea name="contact_th" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text contact_th_error"></span>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <!-- Modal Add Footer social media info -->
    <div class="modal fade" id="showFooterSmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Create Footer social media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.footersm.store') }}" id="addFooterSmFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Social Media Logo</label>
                            <input name="social_media" type="file" class="form-control" value="{{ old('social_media') }}" onchange="document.getElementById('sm_logo').src = window.URL.createObjectURL(this.files[0])">
                            <img id="sm_logo" width="110px">
                            <span class="text-danger error-text social_media_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label>Social Media Link</label>
                            <input type="text" name="social_media_link" value="{{ old('social_media_link') }}" class="form-control">
                            <span class="text-danger error-text social_media_link_error"></span>
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Social Media</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <!-- Modal Add Footer Qrcode info -->
    <div class="modal fade" id="showFooterQrcodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Create Footer Qrcode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.footerqrcode.store') }}" id="addFooterQrcodeFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>App Title</label>
                            <input type="text" name="app_title" value="{{ old('app_title') }}" class="form-control">
                            <span class="text-danger error-text app_title_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label>Qrcode Logo</label>
                            <input name="qrcode" type="file" class="form-control" value="{{ old('qrcode') }}" onchange="document.getElementById('qrcode_logo').src = window.URL.createObjectURL(this.files[0])">
                            <img id="qrcode_logo" width="110px">
                            <span class="text-danger error-text qrcode_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label>Qrcode Link</label>
                            <input type="text" name="qrcode_link" value="{{ old('qrcode_link') }}" class="form-control">
                            <span class="text-danger error-text qrcode_link_error"></span>
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Qrcode</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="container"> <!-- Footer Contact -->
        <h4>Contact</h4>
        <ul class="list-group list-group-flush position-relative ps-0">
            @forelse ($footercontact as $footerct)
    
                <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link" id="nav-ch-tab" data-bs-toggle="tab" href="#nav-ch" role="tab" aria-controls="nav-ch" aria-selected="false">Chinese</a>
                    <a class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" href="#nav-en" role="tab" aria-controls="nav-en" aria-selected="true">English</a>
                    <a class="nav-link" id="nav-kh-tab" data-bs-toggle="tab" href="#nav-kh" role="tab" aria-controls="nav-kh" aria-selected="false">Khmer</a>
                    <a class="nav-link" id="nav-th-tab" data-bs-toggle="tab" href="#nav-th" role="tab" aria-controls="nav-th" aria-selected="false">Thai</a>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                        <!-- Summernote -->
                        @php
                            echo $footerct->contact_ch
                        @endphp
                        <!-- Summernote -->
                    </div>
                    <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                        <!-- Summernote -->
                        @php
                            echo $footerct->contact_en
                        @endphp
                        <!-- Summernote -->
                    </div>
                    <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                        <!-- Summernote -->
                        @php
                            echo $footerct->contact_kh
                        @endphp
                        <!-- Summernote -->
                    </div>
                    <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                        <!-- Summernote -->
                        @php
                            echo $footerct->contact_th
                        @endphp
                        <!-- Summernote -->
                    </div>
                </div>

                <div class="position-absolute top-0 end-0">
                    <a href="{{ route('admin.footer.edit', $footerct->id) }}" class="btn"><i class="bi bi-pencil-square text-muted pe-0" style="font-size:24px;"></i></a>
                </div>
    
            @empty
                <p class="text-center">No contact to show</p>
            @endforelse

        </ul>
    </div>
    
    <div class="container my-3 py-3"> <!-- Footer Social Media -->
        <hr>
        <h4>Social Media</h4>
        <ul class="ps-0">
            @forelse ($footersocialmedia as $sm)
                <li style="list-style: none;">
                    
                    <img src="{{asset('upload/socialmedia/')}}/{{ $sm->social_media }}" alt="slide" width="30" class="border border-info p-1">
                    <form action="/admin/footersm/{{ $sm->id }}" method="POST" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                        @csrf
                        @method('delete')
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="text-danger btn p-0" title="Delete"><i class="bi bi-x-square"></i></button>
                        </div>
                    </form>
                    
                    <p>{{ $sm->social_media_link }}</p>
                </li>
            @empty
                <p class="text-center">No social media to show</p>
            @endforelse
            
        </ul>
    </div>

    <div class="container"> <!-- Footer Qrcode -->
        <hr>
        <h4>Qrcode</h4>
        <ul class="ps-0">
            @forelse ($footerqrcode as $qrcode)
                <li style="list-style: none;">

                    <img src="{{asset('upload/qrcode/')}}/{{ $qrcode->qrcode }}" alt="slide" width="30" class="border border-info p-1">
                    <form action="/admin/footerqrcode/{{ $qrcode->id }}" method="POST" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                        @csrf
                        @method('delete')
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="text-danger btn p-0" title="Delete"><i class="bi bi-x-square"></i></button>
                        </div>
                    </form>
                    
                    <p class="mb-0">{{ $qrcode->app_title }}</p>
                    <p>{{ $qrcode->qrcode_link }}</p>
                </li>
            @empty
                <p class="text-center">No qrcode to show</p>
            @endforelse
            
        </ul>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Save Footer Contact Form
            $('#addFooterContactFormId').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    method:$(this).attr('method'),
                    url:$(this).attr('action'),
                    data:new FormData(this),
                    dataType: "json",
                    processData:false,
                    contentType:false,
                    beforeSend: function(){
                        $(document).find('span.error-text').text('')
                    },
                    success: function (data) {
                        if(data.status==0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#addFooterContactFormId')[0].reset()
                            $('#showFooterContactModal').modal('hide')
                            document.location.href = "{{ route('admin.footer.index') }}"
                        }
                    }
                });
            });

            // Save Footer Social Media Form
            $('#addFooterSmFormId').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    method:$(this).attr('method'),
                    url:$(this).attr('action'),
                    data:new FormData(this),
                    dataType: "json",
                    processData:false,
                    contentType:false,
                    beforeSend: function(){
                        $(document).find('span.error-text').text('')
                    },
                    success: function (data) {
                        if(data.status==0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#addFooterSmFormId')[0].reset()
                            $('#showFooterSmModal').modal('hide')
                            document.location.href = "{{ route('admin.footer.index') }}"
                        }
                    }
                });
            });

            // Save Footer Qrcode Form
            $('#addFooterQrcodeFormId').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    method:$(this).attr('method'),
                    url:$(this).attr('action'),
                    data:new FormData(this),
                    dataType: "json",
                    processData:false,
                    contentType:false,
                    beforeSend: function(){
                        $(document).find('span.error-text').text('')
                    },
                    success: function (data) {
                        if(data.status==0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#addFooterQrcodeFormId')[0].reset()
                            $('#showFooterQrcodeModal').modal('hide')
                            document.location.href = "{{ route('admin.footer.index') }}"
                        }
                    }
                });
            });

        }); 
    </script>
@endsection