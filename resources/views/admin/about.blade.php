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
                    <li class="breadcrumb-item" id="add_about_info" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#showAboutModal">Add Information</li>
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
                        <ul class="alert alert-warning d-none" id="save_errList"></ul>
                        <div class="form-group mb-md-3">
                            <label>About Us Banner</label>
                            <input name="banner" type="file" class="form-control" onchange="document.getElementById('output_banner').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text banner_error"></span>
                            <img id="output_banner" width="110px">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Mission</label>
                            <textarea name="mission" class="textarea_autosize form-control"></textarea>
                            <span class="text-danger error-text mission_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Goal</label>
                            <textarea name="goal" class="textarea_autosize form-control"></textarea>
                            <span class="text-danger error-text goal_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Value</label>
                            <textarea name="value" class="textarea_autosize form-control"></textarea>
                            <span class="text-danger error-text value_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control">
                            <span class="text-danger error-text phone_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control">
                            <span class="text-danger error-text address_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Social Media</label>
                            <input name="social" type="text" class="form-control">
                            <span class="text-danger error-text social_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Operating</label>
                            <input name="operating" type="text" class="form-control" placeholder="Day&time">
                            <span class="text-danger error-text operating_error"></span>
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end modal -->

    <!-- Modal Edit about info -->
    <div class="modal fade" id="showEditAboutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Edit About us Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="" id="editAboutFormId">
                        @csrf
                        <ul class="alert alert-warning d-none" id="save_errList"></ul>
                        <div class="form-group mb-md-3">
                            <label>About Us Banner</label>
                            <input name="banner" type="file" class="form-control" onchange="document.getElementById('output_banner').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text banner_error"></span>
                            <img id="output_banner" width="110px">
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Mission</label>
                            <textarea name="mission" class="textarea_autosize form-control"></textarea>
                            <span class="text-danger error-text mission_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Goal</label>
                            <textarea name="goal" class="textarea_autosize form-control"></textarea>
                            <span class="text-danger error-text goal_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Value</label>
                            <textarea name="value" class="textarea_autosize form-control"></textarea>
                            <span class="text-danger error-text value_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Phone</label>
                            <input name="phone" type="text" class="form-control">
                            <span class="text-danger error-text phone_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Address</label>
                            <input name="address" type="text" class="form-control">
                            <span class="text-danger error-text address_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Social Media</label>
                            <input name="social" type="text" class="form-control">
                            <span class="text-danger error-text social_error"></span>
                        </div>
                
                        <div class="form-group mb-md-3">
                            <label>Operating</label>
                            <input name="operating" type="text" class="form-control" placeholder="Day&time">
                            <span class="text-danger error-text operating_error"></span>
                        </div>
                
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Update</button>
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

            <div class="position-absolute top-0 end-0">
                <a href="#" data-id={{$about->id}} id="showEditAboutForm"><i class="bi bi-pencil-square btn text-muted pe-0" style="font-size:24px;"></i></a>
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

            // Edit About Form
            $('#showEditAboutForm').on('click', function () {
                var about_id=$(this).data('id')
                $('#showEditAboutModal').modal('show')   
            });
        });
    </script>
@endsection



