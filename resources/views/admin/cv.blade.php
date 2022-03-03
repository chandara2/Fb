@extends('layout.layout_admin')
@section('title', 'ADMIN CV')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Curriculum Vitae</h1>
        </div>
    </div>

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">CV</li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#showCvModal">New CV</a>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Modal Add company info -->
    <div class="modal fade" id="showCvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Create Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.cv.store') }}" id="addCvFormId">
                        @csrf

                        <div class="form-group mb-md-3">
                            <label>CV Profil</label>
                            <input name="photo" type="file" class="form-control" value="{{ old('photo') }}" onchange="document.getElementById('cvprofile').src = window.URL.createObjectURL(this.files[0])">
                            <span class="text-danger error-text photo_error"></span>
                            <img id="cvprofile" width="110px">
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Position Apply</label>
                            <input name="position_apply" type="text" class="form-control">
                            <span class="text-danger error-text position_apply_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Expected Salary</label>
                            <input name="expected_salary" type="text" class="form-control">
                            <span class="text-danger error-text expected_salary_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Khmer Name</label>
                            <input name="kname" type="text" class="form-control">
                            <span class="text-danger error-text kname_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>English Name</label>
                            <input name="ename" type="text" class="form-control">
                            <span class="text-danger error-text ename_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Nick Name</label>
                            <input name="nname" type="text" class="form-control">
                            <span class="text-danger error-text nname_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>House No.</label>
                            <input name="house_no" type="text" class="form-control">
                            <span class="text-danger error-text house_no_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Streat No.</label>
                            <input name="streat_no" type="text" class="form-control">
                            <span class="text-danger error-text streat_no_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Group No.</label>
                            <input name="group_no" type="text" class="form-control">
                            <span class="text-danger error-text group_no_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Village</label>
                            <input name="village" type="text" class="form-control">
                            <span class="text-danger error-text village_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Commune</label>
                            <input name="commune" type="text" class="form-control">
                            <span class="text-danger error-text commune_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>District</label>
                            <input name="district" type="text" class="form-control">
                            <span class="text-danger error-text district_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>province</label>
                            <input name="province" type="text" class="form-control">
                            <span class="text-danger error-text province_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>country</label>
                            <input name="country" type="text" class="form-control">
                            <span class="text-danger error-text country_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>dob</label>
                            <input name="dob" type="text" class="form-control">
                            <span class="text-danger error-text dob_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>sex</label>
                            <input name="sex" type="text" class="form-control">
                            <span class="text-danger error-text sex_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>email</label>
                            <input name="email" type="text" class="form-control">
                            <span class="text-danger error-text email_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Khmer Phone</label>
                            <input name="kphone" type="text" class="form-control">
                            <span class="text-danger error-text kphone_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Country Code</label>
                            <input name="country_code" type="text" class="form-control">
                            <span class="text-danger error-text country_code_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>Passport</label>
                            <input name="passport" type="text" class="form-control">
                            <span class="text-danger error-text passport_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>id_card</label>
                            <input name="id_card" type="text" class="form-control">
                            <span class="text-danger error-text id_card_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>height</label>
                            <input name="height" type="text" class="form-control">
                            <span class="text-danger error-text height_error"></span>
                        </div>

                        <div class="form-group mb-md-3">
                            <label>weight</label>
                            <input name="weight" type="text" class="form-control">
                            <span class="text-danger error-text weight_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label>nationality</label>
                            <input name="nationality" type="text" class="form-control">
                            <span class="text-danger error-text nationality_error"></span>
                        </div>
                        <div class="form-group mb-md-3">
                            <label>marital_status</label>
                            <input name="marital_status" type="text" class="form-control">
                            <span class="text-danger error-text marital_status_error"></span>
                        </div>



                        {{-- <div class="form-group mb-md-3">
                            <label>Nick Name</label>
                            <textarea name="nname" class="textarea_autosize form-control summernote"></textarea>
                            <span class="text-danger error-text nname_error"></span>
                        </div> --}}

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
                            <button type="submit" class="btn btn-info">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end add modal -->

    {{-- <div class="container-fluid">
        @if (session('userdelete'))
            <div class="alert alert-success">{{session('userdelete')}}</div>
        @endif
        
        <table class="customdatatable table table-hover table-bordered" style="width:100%">
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
            <tfoot class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Company</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div> --}}

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
            $('#addCvFormId').on('submit', function (e) {
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
                            $('#addCvFormId')[0].reset()
                            $('#showCvModal').modal('hide')
                            document.location.href = "{{ route('admin.companyinfo.index') }}"
                        }
                    }
                });
            });
        }); 
    </script>
@endsection