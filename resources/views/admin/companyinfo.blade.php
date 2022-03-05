@extends('layout.layout_admin')
@section('title', 'ADMIN INFO')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Company Information</h1>
        </div>
    </div>

    <!-- Modal Add company info -->
    <div class="modal fade" id="showCompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Create Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.companyinfo.store') }}" id="addCompanyFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>Company name</label>
                            <input name="company" type="text" class="form-control">
                            <span class="text-danger error-text company_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Industry</label>
                            <select name="industry" value="{{ old('industry') }}" class="form-select">
                                <option selected disabled>Select Company Industry</option>
                                @foreach ($job_industrys as $job_industry)
                                    <option>{{ $job_industry->industry_en }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text industry_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Number of staff</label>
                            <input name="number_staff" type="text" class="form-control">
                            <span class="text-danger error-text number_staff_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Website</label>
                            <input name="website" type="text" class="form-control">
                            <span class="text-danger error-text website_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Province/City</label>
                            <select name="province" value="{{ old('province') }}" class="form-select">
                                <option selected disabled>Select Company Province</option>
                                @foreach ($job_locations as $location)
                                    <option>{{ $location->location_en }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text province_error"></span>
                        </div>


                        <div class="form-group mb-md-3">
                            <label>Detail Location</label>
                            <input name="detail_location" type="text" class="form-control">
                            <span class="text-danger error-text detail_location_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Company Profile</label>
                            <textarea name="company_profile" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text company_profile_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Company Logo</label>
                            <input name="logo" type="file" class="form-control" value="{{ old('logo') }}" onchange="document.getElementById('companyinfologo').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text logo_error"></span>
                            <img id="companyinfologo" width="110px">
                        </div>

                        <div class="h5 text-info text-center text-uppercase">Contact Information</div>

                        <div class="row"> <!-- Row Contact -->
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Name</label>
                                    <input name="contact_name" type="text" class="form-control">
                                    <span class="text-danger error-text contact_name_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Position</label>
                                    <input name="contact_position" type="text" class="form-control">
                                    <span class="text-danger error-text contact_position_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Email</label>
                                    <input name="contact_email" type="text" class="form-control">
                                    <span class="text-danger error-text contact_email_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Contact Phone</label>
                                    <input name="contact_phone" type="text" class="form-control">
                                    <span class="text-danger error-text contact_phone_error"></span>
                                </div>
                            </div>
                        </div> <!-- End row -->
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->
    
    <div class="card container px-0 shadow">
        <div class="card-header position-relative bg-primary">
            <h2 class="mb-0 text-white">Company List</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#showCompanyModal" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New Company</button>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                @if (session('userdelete'))
                    <div class="alert alert-success">{{session('userdelete')}}</div>
                @endif
                
                <table class="customdatatable table table-striped table-bordered" style="width:100%">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Company</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companyinfos as $i => $companyinfo)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$companyinfo->company}}</td>
                            <td>
                                <img src="{{asset('upload/companylogo/')}}/{{$companyinfo->logo}}" alt="logo here" class="me-3" style="width: 50px; height: 50px; object-fit: contain;">
                                @if($companyinfo->recruitment == true)<i class="bi bi-person-check"></i>@endif
                            </td>
                            <td>
                                <a href="/admin/companyinfo/{{ $companyinfo->id }}/edit"><i class="bi bi-pencil-square btn text-muted pe-0" style="font-size:24px;"></i></a>
                                
                                <form action="/admin/companyinfo/{{ $companyinfo->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm text-danger" title="Delete"><i class="bi bi-trash" style="font-size:24px;"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <p class="text-center text-info">No Company Info.</p>
                        @endforelse
                    </tbody>
                </table>
        
            </div>
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

            // Save Company Form
            $('#addCompanyFormId').on('submit', function (e) {
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
                            $('#addCompanyFormId')[0].reset()
                            $('#showCompanyModal').modal('hide')
                            document.location.href = "{{ route('admin.companyinfo.index') }}"
                        }
                    }
                });
            });
        }); 
    </script>
@endsection