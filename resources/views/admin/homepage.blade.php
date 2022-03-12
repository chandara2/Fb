@extends('layout.layout_admin')
@section('title', 'ADMIN INFO')

@section('content')

    <!-- Modal Add Banner Slide -->
    <div class="modal fade" id="showSlideModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Add banner slide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.homepage.store') }}" id="addSlideFormId">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-md-3">
                            <label>Slide banner</label>
                            <input name="slide" type="file" class="form-control" value="{{ old('slide') }}" onchange="document.getElementById('homeslide').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text slide_error"></span>
                            <br>
                            <img id="homeslide" width="110px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Slide</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end add modal -->

    <!-- Modal Add Partner -->
    <div class="modal fade" id="showPartnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Add Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.partnerstore') }}" id="addPartnerFormId">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-md-3">
                            <label>Partner Logo</label>
                            <input name="logo" type="file" class="form-control" value="{{ old('logo') }}" onchange="document.getElementById('partnerlogo').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text logo_error"></span>
                            <br>
                            <img id="partnerlogo" width="110px">
                        </div>
                        <div class="form-group mb-md-3">
                            <label>Partner Link</label>
                            <input type="text" name="link" value="{{ old('link') }}" class="form-control">
                            <span class="text-danger error-text link_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Partner</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="card container mt-5 px-0 shadow">
        <div class="card-header position-relative bg-light">
            <h2 class="mb-0 text-primary">List of slides</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showSlideModal" class="btn btn-primary position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New Slide</button>
        </div>
        <div class="card-body" id="show_all_slides"></div>
    </div>

    <div class="card container mt-5 px-0 shadow">
        <div class="card-header position-relative bg-light">
            <h2 class="mb-0 text-primary">List of partner</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showPartnerModal" class="btn btn-primary position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New Partner</button>
        </div>
        <div class="card-body" id="show_all_partners"></div>
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

            // Save Slide Form
            $('#addSlideFormId').on('submit', function (e) {
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
                            slidefetch();
                            $('#showSlideModal').modal('hide')
                            $('#addSlideFormId')[0].reset();
                            $('#homeslide').attr('src', "");
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
                            url: "{{ route('admin.slidedelete') }}",
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
                                slidefetch();
                            }
                        });
                    }
                })
            });

            // Fetch all User ajax request
            slidefetch();

            function slidefetch() {
                $.ajax({
                    url: "{{ route('admin.slidefetch') }}",
                    method: 'get',
                    success: function(response) {
                        $("#show_all_slides").html(response);
                    }
                });
            }





            // Save Partner Form
            $('#addPartnerFormId').on('submit', function (e) {
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
                            partnerfetch();
                            $('#showPartnerModal').modal('hide')
                            $('#addPartnerFormId')[0].reset();
                            $('#partnerlogo').attr('src', "");
                        }
                    }
                });
            });


             // Delete Job ajax request
            $(document).on('click', '.deleteIcon1', function(e) {
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
                            url: "{{ route('admin.partnerdelete') }}",
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
                                partnerfetch();
                            }
                        });
                    }
                })
            });

            // Fetch all User ajax request
            partnerfetch();

            function partnerfetch() {
                $.ajax({
                    url: "{{ route('admin.partnerfetch') }}",
                    method: 'get',
                    success: function(response) {
                        $("#show_all_partners").html(response);
                    }
                });
            }







            
        }); 
    </script>
@endsection