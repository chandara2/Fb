@extends('layout.layout_admin')
@section('title', 'ADMIN INFO')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Homepage</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <button type="submit" data-bs-toggle="modal" data-bs-target="#showPartnerModal" class="btn btn-sm btn-primary mb-3 rounded-0 w-auto"><i class="bi bi-plus-square-dotted"></i> Partner</button>
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

    <!-- Modal Add Partner -->
    <div class="modal fade" id="showPartnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
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
                            <button type="submit" class="btn btn-info">Add Partner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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
                            document.location.href = "{{ route('admin.partner') }}"
                        }
                    }
                });
            });
        }); 
    </script>
@endsection