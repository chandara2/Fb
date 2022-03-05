@extends('layout.layout_admin')
@section('title', 'ADMIN CV')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Curriculum Vitae</h1>
        </div>
    </div>

    <!-- Modal Add CV -->
    <div class="modal fade" id="addCvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-info bg-opacity-50">
                <h5 class="modal-title" id="exampleModalLabel">Create CV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.cv.store') }}" id="addCvFormId">
                        @csrf

                        <div class="row"> <!--Row Input -->
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>CV Profile</label>
                                    <input name="photo" type="file" class="form-control" value="{{ old('photo') }}" onchange="document.getElementById('cvprofile').src = window.URL.createObjectURL(this.files[0])">
                                    <span class="text-danger error-text photo_error"></span>
                                    <img id="cvprofile" width="110px">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Position Apply</label>
                                    <input name="position_apply" type="text" class="form-control">
                                    <span class="text-danger error-text position_apply_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Expected Salary</label>
                                    <input name="expected_salary" type="text" class="form-control">
                                    <span class="text-danger error-text expected_salary_error"></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-md-3">
                                    <label>Khmer Name</label>
                                    <input name="kname" type="text" class="form-control">
                                    <span class="text-danger error-text kname_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-md-3">
                                    <label>English Name</label>
                                    <input name="ename" type="text" class="form-control">
                                    <span class="text-danger error-text ename_error"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-md-3">
                                    <label>Nick Name</label>
                                    <input name="nname" type="text" class="form-control">
                                    <span class="text-danger error-text nname_error"></span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mb-md-3">
                                    <label>House No.</label>
                                    <input name="house_no" type="text" class="form-control">
                                    <span class="text-danger error-text house_no_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-md-3">
                                    <label>Streat No.</label>
                                    <input name="streat_no" type="text" class="form-control">
                                    <span class="text-danger error-text streat_no_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-md-3">
                                    <label>Group No.</label>
                                    <input name="group_no" type="text" class="form-control">
                                    <span class="text-danger error-text group_no_error"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Village</label>
                                    <input name="village" type="text" class="form-control">
                                    <span class="text-danger error-text village_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Commune</label>
                                    <input name="commune" type="text" class="form-control">
                                    <span class="text-danger error-text commune_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>District</label>
                                    <input name="district" type="text" class="form-control">
                                    <span class="text-danger error-text district_error"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Province</label>
                                    <input name="province" type="text" class="form-control">
                                    <span class="text-danger error-text province_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Country</label>
                                    <input name="country" type="text" class="form-control">
                                    <span class="text-danger error-text country_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Date of birth</label>
                                    <input name="dob" type="date" class="form-control">
                                    <span class="text-danger error-text dob_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-md-3">
                                    <label>Sex</label>
                                    <select name="sex" value="{{ old('sex') }}" class="form-select">
                                        <option selected disabled>Select Sex</option>
                                        @foreach ($sexs as $sex)
                                            <option>{{ $sex->gender_en }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text sex_error"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-md-3">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Khmer phone</label>
                                    <input name="kphone" type="text" class="form-control">
                                    <span class="text-danger error-text kphone_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Thai phone</label>
                                    <input name="tphone" type="text" class="form-control">
                                    <span class="text-danger error-text tphone_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-md-3">
                                    <label>Country Code</label>
                                    <input name="country_code" type="text" class="form-control">
                                    <span class="text-danger error-text country_code_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Passport No</label>
                                    <input name="passport" type="text" class="form-control">
                                    <span class="text-danger error-text passport_error"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-md-3">
                                    <label>Identity Card No</label>
                                    <input name="id_card" type="text" class="form-control">
                                    <span class="text-danger error-text id_card_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-md-3">
                                    <label>Height</label>
                                    <input name="height" type="number" class="form-control">
                                    <span class="text-danger error-text height_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-md-3">
                                    <label>Weight</label>
                                    <input name="weight" type="number" class="form-control">
                                    <span class="text-danger error-text weight_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Nationality</label>
                                    <input name="nationality" type="text" class="form-control">
                                    <span class="text-danger error-text nationality_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-md-3">
                                    <label>Marital Status</label>
                                    <select name="marital_status" value="{{ old('marital_status') }}" class="form-select">
                                        <option selected disabled>Select Status</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->status }}">{{ $status->status }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text marital_status_error"></span>
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

    

    <div class="card container px-0 shadow">
        <div class="card-header position-relative bg-primary">
            <h2 class="mb-0 text-white">CV List</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#addCvModal" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3"><i class="bi bi-plus-circle"></i> Add New CV</button>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                @if (session('userdelete'))
                    <div class="alert alert-success">{{session('userdelete')}}</div>
                @endif
                
                <table class="customdatatable table table-hover table-bordered" style="width:100%">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Uid</th>
                            <th>Profile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cvs as $i => $cv)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$cv->uid}}</td>
                            <td>
                                <img src="{{asset('upload/cvprofile/')}}/{{$cv->photo}}" alt="CV Profile" class="me-3" style="width: 50px; height: 50px; object-fit: contain;">
                            </td>
                            <td>
                                <a href="/admin/cv/{{ $cv->id }}"><i class="bi bi-eye btn text-muted pe-0" style="font-size:24px;"></i></a>
                                
                                <form action="/admin/cv/{{ $cv->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
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

            // Save CV Form
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
                            $('#addCvModal').modal('hide')
                            document.location.href = "{{ route('admin.cv.index') }}"
                        }
                    }
                });
            });

        }); 
    </script>
@endsection