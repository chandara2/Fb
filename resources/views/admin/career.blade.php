@extends('layout.layout_admin')
@section('title', 'ADMIN CAREER')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Career Resource</h1>
        </div>
    </div>

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Career Resource</li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#showCareerModal">New Post</a>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Modal Add Post -->
    <div class="modal fade" id="showCareerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Create Career Resource</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.career.store') }}" id="addCareerFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Type</label>
                            <select name="type" value="{{ old('type') }}" class="form-select">
                                <option selected disabled>Select Post Type</option>
                                @foreach ($postgroups as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text type_error"></span>
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
                                    <label class="mt-3">Title</label>
                                    <input name="title_en" type="text" class="form-control">
                                    <span class="text-danger error-text title_en_error"></span>
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_en" class="textarea_autosize form-control summernote"></textarea>
                                        <span class="text-danger error-text post_en_error"></span>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_ch" type="text" class="form-control">
                                    <span class="text-danger error-text title_ch_error"></span>
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_ch" class="textarea_autosize form-control summernote"></textarea>
                                        <span class="text-danger error-text post_ch_error"></span>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-kh" role="tabpanel" aria-labelledby="nav-kh-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_kh" type="text" class="form-control">
                                    <span class="text-danger error-text title_kh_error"></span>
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_kh" class="textarea_autosize form-control summernote"></textarea>
                                        <span class="text-danger error-text post_kh_error"></span>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-th" role="tabpanel" aria-labelledby="nav-th-tab">
                                    <label class="mt-3">Title</label>
                                    <input name="title_th" type="text" class="form-control">
                                    <span class="text-danger error-text title_th_error"></span>
                                    <div class="form-group mb-md-3 mt-3">
                                        <label>Article</label>
                                        <textarea name="post_th" class="textarea_autosize form-control summernote"></textarea>
                                        <span class="text-danger error-text post_th_error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="container-fluid">
        @if (session('userdelete'))
            <div class="alert alert-success">{{session('userdelete')}}</div>
        @endif
        
        <table id="update_status_switch" class="customdatatable table table-hover table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Post</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($careers as $i => $career)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$career->title_en}}</td>
                    <td>
                        <a href="/admin/career/{{ $career->id }}/edit" title="Edit"><i class="bi bi-pencil-square text-primary"></i></a>
                        <form action="/admin/career/{{ $career->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Post</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div> <!-- end container-fluid -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Save Job Form
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
                    success: function (data) {
                        if(data.status==0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#addCareerFormId')[0].reset()
                            $('#showCareerModal').modal('hide')
                            document.location.href = "{{ route('admin.career.index') }}"
                        }
                    }
                });
            });
            
        });
    </script>


@endsection