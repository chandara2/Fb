@extends('layout.layout_app')
@section('title', 'SINGLE JOB')

@section('content')

<div class="container">
    @foreach ($company_jobs as $company_job)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row bg-light">
                <div class="col-md-6">
                    <h2>{{$company_job->job_title}}</h2>
                    <p>{{$company_job->company}}</p>
                    <h2 class="text-danger">{{$company_job->salary}}</h2>
                </div>
                <div class="col-md-6 text-end">
                    <p class="text-danger">Closing Date: {{$company_job->deadline}}</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-8">
                    <table class="table border">
                        <tr>
                            <th class="table-light">Level</th>
                            <td>LV NO {{$company_job->year_of_exp}}</td>
                            <th class="table-light">Term</th>
                            <td>{{$company_job->term}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Year of Exp.</th>
                            <td>{{$company_job->year_of_exp}}</td>
                            <th class="table-light">Function</th>
                            <td>{{$company_job->job_function}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Hiring</th>
                            <td>{{$company_job->hiring}}</td>
                            <th class="table-light">Industry</th>
                            <td>{{$company_job->industry}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Salary</th>
                            <td>{{$company_job->salary}}</td>
                            <th class="table-light">Qualification</th>
                            <td>{{$company_job->qualification}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Sex</th>
                            <td>{{$company_job->sex}}</td>
                            <th class="table-light">Language</th>
                            <td>{{$company_job->language}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Age</th>
                            <td>{{$company_job->age}}</td>
                            <th class="table-light">Location</th>
                            <td>{{$company_job->location}}</td>
                        </tr>
                    </table>
                    <h5>Job Description & Requirements</h5>
                    <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$company_job->detail}}</textarea>
                    <h5>Company Profile</h5>
                    <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$company_job->company_profile}}</textarea>
                    <h5>Contact Information</h5>
                    <img src="{{asset('pics/user2.png')}}" alt="" width="65" class="mb-2">
                    <div><i class="fas fa-mobile-alt"></i>&nbsp;{{$company_job->contact_phone}}</div>
                    <div><i class="fas fa-envelope"></i>&nbsp;{{$company_job->contact_email}}</div>
                    <h5>Similar Jobs</h5>
                </div>
                <div class="col-md-4">
                    <div>
                        <img src="{{asset('upload/companylogo/')}}/{{$company_job->logo}}" alt="AgencyLogo" height="100">
                        <h5 class="my-3">{{$company_job->company}}</h5>
                        <p><i class="fas fa-map-marker-alt"></i> {{$company_job->province}}</p>
                        <p><i class="fas fa-map-marker-alt"></i> {{$company_job->detail_location}}</p>
                        <p><i class="far fa-user"></i> {{$company_job->number_staff}}</p>
                        <p><i class="fas fa-globe-asia"></i> <a href="{{$company_job->website}}">{{$company_job->website}}</a></p>
                        @if (auth()->user()!=null)
                            <a href="{{route('agency.dashboard')}}" class="btn btn-outline-primary">Employer Homepage</a>
                        @endif
                        @endforeach
                        {{-- end foreach jobagencys --}}

                        <ul class="list-group mt-3">
                            <li class="list-group-item active bg-info border-info" aria-current="true">Hot Jobs</li>
                            @foreach ($hotjobs as $item)
                                <li class="list-group-item ps-0 py-1">
                                    <span class="position-relative"><a href="
                                        @if(auth()->user()!=null)
                                        /agency/jobs/{{$item->id}}
                                        @else
                                        /job/{{$item->id}}
                                        @endif
                                        " class="text-dark btn py-0">{{Str::limit($item->job_title , 30)}}</a></span>
                                    <span class="position-absolute end-0 pe-2 text-danger">{{$item->salary}}</span>

                                    @if (auth()->user()!=null)
                                    @else
                                    <span class="d-block"><a href="/agency/{{$item->aid}}" class="text-muted btn py-0" style="font-size: 12px;">{{$item->company}}</a></span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
