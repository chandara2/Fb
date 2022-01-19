@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Company Information</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div id="wrap_agency_profile" class="position-relative">
            @foreach ($companyinfos as $companyinfo)
            <div class="row py-5 brand-bg5">
                <div class="col-md-2">
                    <img src="{{asset('upload/companylogo/')}}/{{$companyinfo->logo}}" alt="logo here" class="me-3" width="100%" height="auto" style="max-width: 150px;">
                </div>
                <div class="col-md-10">
                    <div class="h2">{{$companyinfo->company}}</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">{{$companyinfo->number_staff}}</li>
                            <li class="breadcrumb-item">{{$companyinfo->industry}}</li>
                            <li class="breadcrumb-item">{{$companyinfo->province}}</li>
                        </ol>
                        <p class="h1">15</p>
                        <div>Active Jobs</div>
                    </nav>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="h5">Company Profile</div>
                    <textarea disabled class="textarea_autosize form-control border-0 bg-light px-0">{{$companyinfo->company_profile}}</textarea>
                    <br>
                    <div class="h5">Location</div>
                    <p>{{$companyinfo->detail_location}}</p>
                    <br>
                    <div class="h5">Contact Information</div>
                    <img src="{{asset('pics/user2.png')}}" alt="" width="65" class="mb-2">
                    <div><i class="bi bi-phone-vibrate"></i>&nbsp;{{$companyinfo->contact_phone}}</div>
                    <div><i class="bi bi-envelope"></i>&nbsp;{{$companyinfo->contact_email}}</div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0">
                @if (auth()->user()!=null)
                <a href="/admin/companyinfo/{{ $companyinfo->id }}/edit"><i class="bi bi-pencil-square btn text-muted pe-0" style="font-size:24px;"></i></a>
                @endif
            </div>
            @endforeach
        </div>
    </div>

@endsection