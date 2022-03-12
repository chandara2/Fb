@extends('layout.layout_admin')
@section('title', 'ADMIN CAREER')

@section('content')

    <!-- Modal Add Post -->
    <div class="modal fade" id="showCareerModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Create Career Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.career.store') }}" id="addCareerFormId">
                    @csrf
                    <div class="modal-body">
                        <div class="my-2">
                            <label>Type</label>
                            <select name="type" value="{{ old('type') }}" class="form-select">
                                <option selected disabled>Select Post Type</option>
                                @foreach ($postgroups as $type)
                                    <option>{{ $type->type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text type_error"></span>
                        </div>
                        <div class="my-2">
                            <label>Blog Post Image</label>
                            <input name="post_img" type="file" class="form-control" value="{{ old('post_img') }}" onchange="document.getElementById('blogpost').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text post_img_error"></span>
                            <br>
                            <img id="blogpost" width="110px">
                        </div>
                        <div class="my-2">
                            <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" href="#nav-en" role="tab" aria-controls="nav-en" aria-selected="true">English</a>
                                <a class="nav-link" id="nav-ch-tab" data-bs-toggle="tab" href="#nav-ch" role="tab" aria-controls="nav-ch" aria-selected="false">Chinese</a>
                                <a class="nav-link" id="nav-kh-tab" data-bs-toggle="tab" href="#nav-kh" role="tab" aria-controls="nav-kh" aria-selected="false">Khmer</a>
                                <a class="nav-link" id="nav-th-tab" data-bs-toggle="tab" href="#nav-th" role="tab" aria-controls="nav-th" aria-selected="false">Thai</a>
                            </nav>

                            <ul class="list-unstyled">
                                <li><span class="text-danger error-text title_en_error"></span></li>
                                <li><span class="text-danger error-text title_ch_error"></span></li>
                                <li><span class="text-danger error-text title_kh_error"></span></li>
                                <li><span class="text-danger error-text title_th_error"></span></li>
                            </ul>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_en" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_en" class="textarea_autosize form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_ch" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_ch" class="textarea_autosize form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_kh" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_kh" class="textarea_autosize form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_th" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_th" class="textarea_autosize form-control summernote"></textarea>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-unstyled">
                                <li><span class="text-danger error-text post_en_error"></span></li>
                                <li><span class="text-danger error-text post_ch_error"></span></li>
                                <li><span class="text-danger error-text post_kh_error"></span></li>
                                <li><span class="text-danger error-text post_th_error"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="card container mt-5 px-0 shadow">
        <div class="card-header position-relative bg-light">
            <h2 class="mb-0 text-primary">Post Career List</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showCareerModal" class="btn btn-primary position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add Post</button>
        </div>
        <div class="card-body" id="show_all_career"></div>
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

            // Save User Form
            $('#addCareerFormId').on('submit', function (e) {
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
                    success: function (response) {
                        if(response.status==0){
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            careerfetch();
                            $('#showCareerModal').modal('hide')
                            $('#addCareerFormId')[0].reset();
                        }
                    }
                });
            });


            // Delete Job ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.careerdelete') }}",
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                console.log(response);
                                Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                                careerfetch();
                            }
                        });
                    }
                })
            });


            // Fetch all User ajax request
            careerfetch();

            function careerfetch() {
                $.ajax({
                    url: "{{ route('admin.careerfetch') }}",
                    method: 'get',
                    success: function(response) {
                    $("#show_all_career").html(response);
                    $("table").DataTable({
                        order: [0, 'asc'],
                        pageLength: 25,
                    });
                    }
                });
            }






            
        });
    </script>


@endsection