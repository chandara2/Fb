@extends('layout.layout_admin')
@section('title', 'ADMIN INFO')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Homepage</h1>
        </div>
    </div>

    <!-- Modal Add Banner Slide -->
    <div class="modal fade" id="showSlideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add banner slide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.homepage.store') }}" id="addSlideFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Slide banner</label>
                            <input name="slide" type="file" class="form-control" value="{{ old('slide') }}" onchange="document.getElementById('companyinfoslide').src = window.URL.createObjectURL(this.files[0])">
                            <img id="companyinfoslide" width="110px">
                            <span class="text-danger error-text slide_error"></span>
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Slide</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <!-- Modal Add Partner -->
    <div class="modal fade" id="showPartnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.partner.store') }}" id="addPartnerFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Partner Logo</label>
                            <input name="logo" type="file" class="form-control" value="{{ old('logo') }}" onchange="document.getElementById('partnerLogo').src = window.URL.createObjectURL(this.files[0])">
                            <img id="partnerLogo" width="110px">
                            <span class="text-danger error-text logo_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label>Partner Link</label>
                            <input type="text" name="link" value="{{ old('link') }}" class="form-control">
                            <span class="text-danger error-text link_error"></span>
                        </div>
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Partner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    <div class="container"> <!-- Banner Slide -->
        <div class="row">
            <button type="submit" data-bs-toggle="modal" data-bs-target="#showSlideModal" class="btn btn-sm btn-primary mb-3 w-auto"><i class="bi bi-plus-circle"></i> Add New Slide</button>
        </div>

        <div class="row">
            @forelse ($homepageslides as $i => $slide)
            <div class="col-xl-2 col-lg-3 col-md-4 mb-3">
                <img src="{{asset('upload/homepageslide/')}}/{{$slide->slide}}" alt="slide" width="100%" height="100" style="object-fit: cover;" class="border border-info p-1">
                <form action="/admin/homepage/{{ $slide->id }}" method="POST" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')" class="bg-info bg-opacity-10">
                    @csrf
                    @method('delete')
                    <div class="d-flex justify-content-between">
                        <span>BANNER SLIDE {{$i+1}}</span>
                        <button type="submit" class="text-danger btn p-0" title="Delete"><i class="bi bi-x-square"></i></button>
                    </div>
                </form>
            </div>
            @empty
            <p class="text-center bg-info">No slide to show</p>
            @endforelse
        </div>
    </div>

    <div class="container"> <!-- Partner -->
        <div class="row">
            <button type="submit" data-bs-toggle="modal" data-bs-target="#showPartnerModal" class="btn btn-sm btn-primary mb-3 w-auto"><i class="bi bi-plus-circle"></i> Add New Partner</button>
        </div>

        <div class="row">
            @forelse ($partners as $i => $partner)
            <div class="col-xl-2 col-lg-3 col-md-4 mb-3">
                <img src="{{asset('upload/partnerlogo/')}}/{{$partner->logo}}" alt="slide" width="100%" height="100" style="object-fit: cover;" class="border border-info p-1">
                <form action="/admin/partner/{{ $partner->id }}" method="POST" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')" class="bg-info bg-opacity-10">
                    @csrf
                    @method('delete')
                    <div class="d-flex justify-content-between">
                        <span title="{{ $partner->link }}">Partner Link {{$i+1}}</span>
                        <button type="submit" class="text-danger btn p-0" title="Delete"><i class="bi bi-x-square"></i></button>
                    </div>
                </form>
            </div>
            @empty
            <p class="text-center bg-info">No partner to show</p>
            @endforelse
        </div>
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

            // Save Banner Slide Form
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
                    success: function (data) {
                        if(data.status==0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#addSlideFormId')[0].reset()
                            $('#showSlideModal').modal('hide')
                            document.location.href = "{{ route('admin.homepage.index') }}"
                        }
                    }
                });
            });

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
                    success: function (data) {
                        if(data.status==0){
                            $.each(data.error, function(prefix, val){
                                $('span.'+prefix+'_error').text(val[0])
                            })
                        }else{
                            $('#addPartnerFormId')[0].reset()
                            $('#showPartnerModal').modal('hide')
                            document.location.href = "{{ route('admin.homepage.index') }}"
                        }
                    }
                });
            });
        }); 
    </script>
@endsection