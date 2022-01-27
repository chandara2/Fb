@extends('layout.layout_admin')
@section('title', 'ABOUT')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">About Us</h1>
        </div>
    </div>

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
                @if ($abouts->isEmpty())
                    <li class="breadcrumb-item" id="add_about_info" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#showAboutForm">Add Information</li>
                @endif
            </ol>
        </nav>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="showAboutForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About us Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="" id="addAboutFormId">
                        @csrf
                        <ul class="alert alert-warning d-none" id="save_errList"></ul>
                        <div class="form-group mb-md-3">
                            <label>About Us Banner</label>
                            <input name="banner" type="file" class="form-control" onchange="document.getElementById('output_banner').src = window.URL.createObjectURL(this.files[0])">
                            <img id="output_banner" width="110px">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Mission</label>
                            <div class="form-floating">
                                <textarea name="mission" class="textarea_autosize form-control" placeholder="Leave a comment here"></textarea>
                                <label for="mission">Description</label>
                            </div>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Goal</label>
                            <textarea name="goal" class="textarea_autosize form-control" placeholder="Leave a comment here"></textarea>
                            <label for="goal">Description</label>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Value</label>
                            <div class="form-floating">
                                <textarea name="value" class="textarea_autosize form-control" placeholder="Leave a comment here"></textarea>
                                <label for="value">Description</label>
                            </div>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Social Media</label>
                            <input name="social" type="text" class="form-control">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Operating</label>
                            <input name="operating" type="text" class="form-control">
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end modal -->

    <div class="container-fluid">
        <ul class="list-group list-group-flush mt-3 position-relative">
            @forelse ($abouts as $about)
    
            <li class="list-group-item text-center">
                <img src="{{asset('upload/aboutsbanner/')}}/{{$about->banner}}" alt="banner" class="img-thumbnail">
            </li>
            <li class="list-group-item">
                <div class="text-danger h4">Mission</div>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->mission}}</textarea>
            </li>
            <li class="list-group-item">
                <div class="text-danger h4">Goal</div>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->goal}}</textarea>
            </li>
            <li class="list-group-item">
                <div class="text-danger h4">Value</div>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->value}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Email</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->email}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Phone</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->phone}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Social Media</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->social}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Operating Hours</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->operating}}</textarea>
            </li>
            <a href="/admin/aboutus/{{$about->id}}/edit" class="position-absolute end-0 top-0"><i class="fas fa-users-cog"></i></a>
    
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

            $(document).on('submit','#addAboutFormId', function (e) {
                e.preventDefault();

                let fd = new FormData($('#addAboutFormId')[0])

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.about.store') }}",
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.status==400){
                            $('#save_errList').html("")
                            $('#save_errList').removeClass("d-none")
                            $.each(response.errMsg, function (key, err_value){
                                $('#save_errList').append('<li>'+err_value+'</li>')
                            })
                        }else if(response.status==200){
                            $('#save_errList').html("")
                            $('#save_errList').addClass("d-none")
                            $('#addAboutFormId').find('input').val()
                            $('#showAboutForm').modal('hide')
                            
                            // use refresh for this form only because it has only a record
                            document.location.href = "{{ route('admin.about.index') }}"
                        }
                    }
                });
                
            });
        });
    </script>
@endsection



