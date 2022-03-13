@extends('layout.layout_admin')
@section('title', 'ADMIN CAREER')

@section('content')

    <!-- Add post modal -->
    <div class="modal fade" id="showCareerModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Create Career Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.career.store') }}" id="addCareerFormId" enctype="multipart/form-data">
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
                                        <textarea name="post_en" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_ch" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_ch" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_kh" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_kh" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_th" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_th" class="form-control summernote"></textarea>
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
    </div>
    <!-- end Add post modal -->

    <!-- Edit post modal -->
    <div class="modal fade" id="editCareerModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Create Career Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.career.store') }}" enctype="multipart/form-data" id="edit_career_form">
                    @csrf
                    <input type="hidden" name="career_id" id="career_id">
                    <input type="hidden" name="img_id" id="img_id">
                    <div class="modal-body">
                        <div class="my-2">
                            <label>Type</label>
                            <select name="type" id="type" class="form-select">
                                @foreach ($postgroups as $type)
                                    <option>{{ $type->type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text type_error"></span>
                        </div>

                        <div class="my-2">
                            <label>Select IMG</label>
                            <input type="file" name="post_img" class="form-control">
                        </div>
                        <div class="mt-2" id="edit_image"></div>

                        <div class="my-2">
                            <nav class="nav nav-tabs" id="nav-tab2" role="tablist">
                                <a class="nav-link active" id="nav-en-tab2" data-bs-toggle="tab" href="#nav-en2" role="tab" aria-controls="nav-en2" aria-selected="true">English</a>
                                <a class="nav-link" id="nav-ch-tab2" data-bs-toggle="tab" href="#nav-ch2" role="tab" aria-controls="nav-ch2" aria-selected="false">Chinese</a>
                                <a class="nav-link" id="nav-kh-tab2" data-bs-toggle="tab" href="#nav-kh2" role="tab" aria-controls="nav-kh2" aria-selected="false">Khmer</a>
                                <a class="nav-link" id="nav-th-tab2" data-bs-toggle="tab" href="#nav-th2" role="tab" aria-controls="nav-th2" aria-selected="false">Thai</a>
                            </nav>

                            <ul class="list-unstyled">
                                <li><span class="text-danger error-text title_en_error"></span></li>
                                <li><span class="text-danger error-text title_ch_error"></span></li>
                                <li><span class="text-danger error-text title_kh_error"></span></li>
                                <li><span class="text-danger error-text title_th_error"></span></li>
                            </ul>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-en2" role="tabpanel" aria-labelledby="nav-en-tab2">
                                    <label class="mt-3">Title</label>
                                    <input name="title_en" id="title_en2" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_en" id="post_en2" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-ch2" role="tabpanel" aria-labelledby="nav-ch-tab2">
                                    <label class="mt-3">Title</label>
                                    <input name="title_ch" id="title_ch2" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_ch" id="post_ch2" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-kh2" role="tabpanel" aria-labelledby="nav-kh-tab2">
                                    <label class="mt-3">Title</label>
                                    <input name="title_kh" id="title_kh2" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_kh" id="post_kh2" class="form-control summernote"></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-th2" role="tabpanel" aria-labelledby="nav-th-tab2">
                                    <label class="mt-3">Title</label>
                                    <input name="title_th" id="title_th2" type="text" class="form-control">
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_th" id="post_th2" class="form-control summernote"></textarea>
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
                        <div name="post_en" class="posten"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="edit_career_btn">Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end Edit post modal -->

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
                            $('#blogpost').attr('src', '')
                        }
                    }
                });
            });



            // Edit User ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('admin.careeredit') }}",
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#career_id").val(response.id);
                        $("#type").val(response.type);
                        $("#title_ch2").val(response.title_ch);
                        $("#title_en2").val(response.title_en);
                        $("#title_kh2").val(response.title_kh);
                        $("#title_th2").val(response.title_th);

                        $("#edit_image").html(
                        `<img src="/upload/blogpost/${response.post_img}" width="100" class="img-fluid">`);
                        $("#img_id").val(response.post_img);

                        $('#post_ch2').summernote('code', response.post_ch);
                        $('#post_en2').summernote('code', response.post_en);
                        $('#post_kh2').summernote('code', response.post_kh);
                        $('#post_th2').summernote('code', response.post_th);

                    }
                });
            });


            // Update User ajax request
            $("#edit_career_form").submit(function(e) {
                    e.preventDefault();
                    const fd = new FormData(this);
                    $("#edit_career_btn").text('Updating...');
                    $.ajax({
                    url: "{{ route('admin.careerupdate') }}",
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Post Updated Successfully!',
                            'success'
                        )
                        careerfetch();
                        $("#edit_career_btn").text('Update Post');
                        $("#edit_career_form")[0].reset();
                        $("#editCareerModal").modal('hide');
                        }else{
                            $.each(response.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
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