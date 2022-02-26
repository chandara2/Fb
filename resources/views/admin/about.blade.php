@extends('layout.layout_admin')
@section('title', 'ABOUT')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">About Us</h1>
        </div>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">About</li>
                @if ($abouts->isEmpty())
                    <li class="breadcrumb-item text-primary" id="add_about_info" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#showAboutModal">Add Information</li>
                @endif
            </ol>
        </nav>
    </div>

    
    <!-- Modal Add about info -->
    <div class="modal fade" id="showAboutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">About us Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="" id="addAboutFormId">
                        @csrf
                        <div class="form-group mb-md-3">
                            <label>About Us Banner</label>
                            <input name="banner" type="file" class="form-control" onchange="document.getElementById('output_banner').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text banner_error"></span>
                            <img id="output_banner" width="110px">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>About info. Chinese</label>
                            <textarea name="aboutus_ch" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text aboutus_ch_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>About info. English</label>
                            <textarea name="aboutus_en" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text aboutus_en_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>About info. Khmer</label>
                            <textarea name="aboutus_kh" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text aboutus_kh_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>About info. Thai</label>
                            <textarea name="aboutus_th" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text aboutus_th_error"></span>
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="container">
        <ul class="list-group list-group-flush mt-3 position-relative">
            @forelse ($abouts as $about)
    
            <li class="list-group-item text-center">
                <img src="{{asset('upload/aboutsbanner/')}}/{{$about->banner}}" alt="Banner" width="256" class="img-thumbnail" style="max-height: 128px; object-fit: cover;">
            </li>
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
                        echo $about->aboutus_ch
                    @endphp
                    <!-- Summernote -->
                </div>
                <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                    <!-- Summernote -->
                    @php
                        echo $about->aboutus_en
                    @endphp
                    <!-- Summernote -->
                </div>
                <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                    <!-- Summernote -->
                    @php
                        echo $about->aboutus_kh
                    @endphp
                    <!-- Summernote -->
                </div>
                <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                    <!-- Summernote -->
                    @php
                        echo $about->aboutus_th
                    @endphp
                    <!-- Summernote -->
                </div>
            </div>

            <div class="position-absolute top-0 end-0">
                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn"><i class="bi bi-pencil-square text-muted pe-0" style="font-size:24px;"></i></a>
            </div>
    
            @empty
                <p class="text-center alert alert-info">About us don't have information</p>
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

            // Save About Form
            $('#addAboutFormId').on('submit', function (e) {
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
                            $('#addAboutFormId')[0].reset();
                            // this refresh use for About form only because it have only one record
                            document.location.href = "{{ route('admin.about.index') }}"
                        }
                    }
                });
            });

        });
    </script>
@endsection



