@extends('layout.layout_app')
@section('title', 'ABOUT US')
@section('style')
    <style>
        .job_title{
            color: #333;
            text-decoration: none;
        }
        .job_title:hover{
            text-decoration: underline;
        }
        .com_name{
            text-decoration: none;
        }
        .com_name:hover{
            text-decoration: underline;
        }
    </style>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="wrap_agency_profile" class="position-relative">

                @foreach ($companys as $company)
                <div class="row py-5 bg-light">
                    <div class="col-md-2">
                        <img src="{{asset('upload/companylogo/')}}/{{$company->logo}}" alt="Company Logo" class="me-3" width="100%" height="auto" style="max-width: 150px;">
                    </div>
                    <div class="col-md-10">
                        <div class="h2">{{$company->company}}</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">{{$company->number_staff}}</li>
                                <li class="breadcrumb-item">{{$company->industry}}</li>
                                <li class="breadcrumb-item">{{$company->province}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-md-12">
                        <h5 style="text-decoration: underline 3px solid pink">Company Profile</h5>
                        <textarea disabled class="textarea_autosize form-control border-0 bg-light">{{$company->company_profile}}</textarea>
                        <br>
                        <h5 style="text-decoration: underline 3px solid pink">Location</h5>
                        <p>{{$company->detail_location}}</p>
                        <br>
                        <h5 style="text-decoration: underline 3px solid pink">Contact Information</h5>
                        <img src="{{asset('asset/image/programmer.png')}}" alt="Contact Info" width="65">
                        {{-- <i class="bi bi-person-circle text-info" style="font-size: 65px;"></i> --}}
                        <div><i class="bi bi-phone-vibrate"></i>&nbsp;{{$company->contact_phone}}</div>
                        <div><i class="bi bi-envelope"></i>&nbsp;{{$company->contact_email}}</div>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0">
                    @if (auth()->user()!=null)
                    <a href="/agency/companylogo/{{$company->id}}/edit"><i class="fas fa-users-cog btn text-muted pe-0"></i></a>
                    @endif
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>Company Jobs</p>

            <ul class="list-group list-group-flush">
                @forelse ($company_jobs as $company_job)
                <li class="list-group-item py-3">
                    <div class="row">
                        <div class="col-md-8">
                            <a href="/job/{{$company_job->job_id}}" class="fw-bold job_title">{{ $company_job->title_en }}</a>
                            @if($company_job->expired_job>now()->addDays(7)) <span class="bg-warning badge">New</span>
                            @else <span class="bg-danger badge">Urgent</span> @endif
                            <div class="py-1"><a href="/company/{{$company_job->com_id}}" class="com_name">{{ $company_job->company }}</a></div>
                            <div style="font-size: 12px;" class="text-muted">{{ $company_job->term }} | {{ $company_job->location }} <span class="text-danger px-1">{{ $company_job->salary }}</span></div>
                        </div>
                        <div class="col-md-4 text-md-end text-sm-start">{{  date('d \\ M Y', strtotime($company_job->expired_job)) }}</div>
                    </div>
                </li>
                @empty
                <p class="text-center">Don't have any jobs announcement yet.</p>
                @endforelse
            </ul>

        </div>
    </div>
</div>

@endsection