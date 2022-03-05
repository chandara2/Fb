@extends('layout.layout_admin')
@section('title', 'ADMIN EDIT CV')

@section('content')

    <div class="container-fluid mt-5">
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.cv.update', $cvid->id)}}">
            @csrf
            @method('PUT')
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Edit CV</h1>

            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">CV Profile</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">                 
                    <input type="file" name="photo" class="form-control" value="{{ $cvid->photo }}" onchange="document.getElementById('cvprofile').src = window.URL.createObjectURL(this.files[0])">
                    <img id="cvprofile" width="110px" src="{{ asset('upload/cvprofile/'.$cvid->photo) }}">
                    <span class="text-danger">@error('photo'){{$message}}@enderror</span>
                </div>
            </div>

            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Position Apply</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="position_apply" value="{{ $cvid->position_apply }}" class="form-control">
                    <span class="text-danger">@error('position_apply'){{$message}}@enderror</span>
                </div>
            </div>

            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Expected Salary</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="expected_salary" value="{{ $cvid->expected_salary }}" class="form-control">
                    <span class="text-danger">@error('expected_salary'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">kname</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="kname" value="{{ $cvid->kname }}" class="form-control">
                    <span class="text-danger">@error('kname'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">ename</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="ename" value="{{ $cvid->ename }}" class="form-control">
                    <span class="text-danger">@error('ename'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">nname</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="nname" value="{{ $cvid->nname }}" class="form-control">
                    <span class="text-danger">@error('nname'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">house_no</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="house_no" value="{{ $cvid->house_no }}" class="form-control">
                    <span class="text-danger">@error('house_no'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">streat_no</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="streat_no" value="{{ $cvid->streat_no }}" class="form-control">
                    <span class="text-danger">@error('streat_no'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">group_no</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="group_no" value="{{ $cvid->group_no }}" class="form-control">
                    <span class="text-danger">@error('group_no'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">village</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="village" value="{{ $cvid->village }}" class="form-control">
                    <span class="text-danger">@error('village'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">commune</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="commune" value="{{ $cvid->commune }}" class="form-control">
                    <span class="text-danger">@error('commune'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">district</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="district" value="{{ $cvid->district }}" class="form-control">
                    <span class="text-danger">@error('district'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">province</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="province" value="{{ $cvid->province }}" class="form-control">
                    <span class="text-danger">@error('province'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">country</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="country" value="{{ $cvid->country }}" class="form-control">
                    <span class="text-danger">@error('country'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">dob</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="dob" value="{{ $cvid->dob }}" class="form-control">
                    <span class="text-danger">@error('dob'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Sex</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="sex" class="form-select">
                        <option>{{ $cvid->sex }}</option>
                        @foreach ($sexs as $sex)
                            <option>{{ $sex->gender_en }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-danger">@error('sex'){{$message}}@enderror</span>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">email</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="email" name="email" value="{{ $cvid->email }}" class="form-control">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">kphone</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="kphone" value="{{ $cvid->kphone }}" class="form-control">
                    <span class="text-danger">@error('kphone'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">tphone</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="tphone" value="{{ $cvid->tphone }}" class="form-control">
                    <span class="text-danger">@error('tphone'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">country_code</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="country_code" value="{{ $cvid->country_code }}" class="form-control">
                    <span class="text-danger">@error('country_code'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">passport</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="passport" value="{{ $cvid->passport }}" class="form-control">
                    <span class="text-danger">@error('passport'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">id_card</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="id_card" value="{{ $cvid->id_card }}" class="form-control">
                    <span class="text-danger">@error('id_card'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">height</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="height" value="{{ $cvid->height }}" class="form-control">
                    <span class="text-danger">@error('height'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">weight</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="weight" value="{{ $cvid->weight }}" class="form-control">
                    <span class="text-danger">@error('weight'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">nationality</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="text" name="nationality" value="{{ $cvid->nationality }}" class="form-control">
                    <span class="text-danger">@error('nationality'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="form-group row mb-md-3">
                <label class="col-xl-3 col-md-2 col-form-label text-md-end pb-0">Marital Status</label>
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <select name="marital_status" class="form-select">
                        <option>{{ $cvid->marital_status }}</option>
                        @foreach ($statuses as $status)
                            <option>{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-danger">@error('marital_status'){{$message}}@enderror</span>
            </div>
            

            

            <div class="modal-footer">
                <a href="/admin/cv/{{ $cvid->id }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection