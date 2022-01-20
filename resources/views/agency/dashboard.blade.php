@extends('layout.layout_app')
@section('title', 'AGENCY DB')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Agency</li>
                @if (auth()->user()!=null && $company_infos->isNotEmpty())
                <li class="breadcrumb-item"><a href="{{ route('agency.job.index') }}" class="text-decoration-none">Job List</a></li>
                @endif
                <li class="breadcrumb-item"><a href="
                    @if (auth()->user()!=null && $company_infos->isEmpty())
                        {{ route('agency.company_info.create') }}
                    @else
                        {{ route('agency.job.create') }}
                    @endif"
                    class="text-decoration-none">Make Announcement</a></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase mb-5" style="text-decoration: underline 3px solid pink">Agency Dashboard</h1>
        </div>
    </div>

    <div class="container">
        <div id="wrap_agency_profile" class="position-relative">
            @foreach ($company_infos as $company_info)
            <div class="row py-5 brand-bg5">
                <div class="col-md-2">
                    <img src="{{asset('upload/companylogo/')}}/{{$company_info->logo}}" alt="logo here" class="me-3" width="100%" height="auto" style="max-width: 150px;">
                </div>
                <div class="col-md-10">
                    <div class="h2">{{$company_info->company}}</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">{{$company_info->number_staff}}</li>
                            <li class="breadcrumb-item">{{$company_info->industry}}</li>
                            <li class="breadcrumb-item">{{$company_info->province}}</li>
                        </ol>
                        <p class="h1">15</p>
                        <div>Active Jobs</div>
                    </nav>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="h5">Company Profile</div>
                    <textarea disabled class="textarea_autosize form-control border-0 bg-light px-0">{{$company_info->company_profile}}</textarea>
                    <br>
                    <div class="h5">Location</div>
                    <p>{{$company_info->detail_location}}</p>
                    <br>
                    <div class="h5">Contact Information</div>
                    <img src="{{asset('pics/user2.png')}}" alt="" width="65" class="mb-2">
                    <div><i class="bi bi-phone-vibrate"></i>&nbsp;{{$company_info->contact_phone}}</div>
                    <div><i class="bi bi-envelope"></i>&nbsp;{{$company_info->contact_email}}</div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0">
                <a href="/agency/companyinfo/{{ $company_info->id }}/edit"><i class="bi bi-pencil-square btn text-muted pe-0" style="font-size:24px;"></i></a>
            </div>
            @endforeach
        </div>
    </div>

@endsection