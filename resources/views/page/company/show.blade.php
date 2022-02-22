@extends('layout.layout_app')
@section('title', 'ABOUT US')

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
                            <img src="{{asset('asset/image/user2.png')}}" alt="Contact Info" width="65">
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
</div>

@endsection