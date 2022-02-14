@extends('layout.layout_app')
@section('title', 'SINGLE JOB')
@section('style')
    <style>
        .company_hover{
            text-decoration: none;
            color: black;
        }
        .company_hover:hover{
            text-decoration: underline;
            color: darkblue;
        }
    </style>
@endsection
@section('content')


<div class="container">
    @foreach ($jobcompanys as $jobcompany)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        {{$jobcompany->title_en}}
                    </h2>
                    <p>{{$jobcompany->company}}</p>
                    <h2 class="text-danger">{{$jobcompany->salary}}</h2>
                    <p class="text-danger">Closing Date: {{$jobcompany->expired_job}}</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-8">
                    <table class="table border">
                        <tr>
                            <th class="table-primary">Title</th>
                            <td>Title {{$jobcompany->title_en}}</td>
                            <th class="table-primary">Term</th>
                            <td>{{$jobcompany->term}}</td>
                        </tr>
                        <tr>
                            <th class="table-primary">Salary</th>
                            <td>{{$jobcompany->salary}}</td>
                            <th class="table-primary">Sex</th>
                            <td>{{$jobcompany->sex}}</td>
                        </tr>
                        <tr>
                            <th class="table-primary">Location</th>
                            <td>{{$jobcompany->location}}</td>
                            <th class="table-primary">Age</th>
                            <td>{{$jobcompany->age}}</td>
                        </tr>
                        <tr>
                            <th class="table-primary">Language</th>
                            <td>{{$jobcompany->language}}</td>
                            <th class="table-primary">Hiring</th>
                            <td>{{$jobcompany->hiring}}</td>
                        </tr>
                        <tr>
                            <th class="table-primary">Function </th>
                            <td>{{$jobcompany->function }}</td>
                            <th class="table-primary">Industry</th>
                            <td>{{$jobcompany->industry}}</td>
                        </tr>
                        <tr>
                            <th class="table-primary">Qualification</th>
                            <td>{{$jobcompany->qualification}}</td>
                            <th class="table-primary">Year of experience</th>
                            <td>{{$jobcompany->year_of_exp}}</td>
                        </tr>
                    </table>
                    <h5 class="mt-4" style="text-decoration: underline 3px solid pink">Job Description & Requirements</h5>
                    <textarea disabled class="textarea_autosize form-control border-0 bg-light">{{$jobcompany->detail}}</textarea>
                    <h5 class="mt-4" style="text-decoration: underline 3px solid pink">Company Profile</h5>
                    <textarea disabled class="textarea_autosize form-control border-0 bg-light">{{$jobcompany->company_profile}}</textarea>
                    <h5>Contact Information</h5>
                    <img src="{{asset('pics/user2.png')}}" alt="" width="65" class="mb-2">
                    <div><i class="bi bi-phone-vibrate"></i>&nbsp;{{$jobcompany->contact_phone}}</div>
                    <div><i class="bi bi-envelope"></i>&nbsp;{{$jobcompany->contact_email}}</div>
                    <h5>Similar Jobs</h5>
                </div>
                <div class="col-md-4">
                    <div>
                        <img src="{{asset('upload/companylogo/')}}/{{$jobcompany->logo}}" alt="AgencyLogo" height="100">
                        <p class="mb-4 mt-3"><a href="/company/{{$jobcompany->ciid}}" class="company_hover">{{$jobcompany->company}}</a></p>
                        <p><i class="bi bi-diagram-2-fill"></i> {{$jobcompany->industry}}</p>
                        <p><i class="bi bi-geo-alt-fill"></i> {{$jobcompany->province}}</p>
                        <p><i class="bi bi-geo-alt-fill"></i> {{$jobcompany->detail_location}}</p>
                        <p><i class="bi bi-people"></i> {{$jobcompany->number_staff}}</p>
                        <p><i class="bi bi-globe"></i> <a target="_blank" href="{{$jobcompany->website}}">{{$jobcompany->website}}</a></p>
                        @if (auth()->user()!=null)
                            <a href="/company/{{$jobcompany->ciid}}" class="btn btn-outline-primary">Employer Homepage</a>
                        @endif

                        <ul class="list-group mt-3">
                            <li class="list-group-item active bg-danger border-danger" aria-current="true">Hot Jobs</li>
                            @foreach ($hotjobs as $hotjob)
                                <li class="list-group-item ps-0 py-0">
                                    <span class="position-relative"><a href="/job/{{$hotjob->id}}" class="text-dark ps-3 text-decoration-none">{{Str::limit($hotjob->title_en , 30)}}</a></span>
                                    <span class="position-absolute end-0 pe-2 text-danger">{{$hotjob->salary}}</span>
                                    <span class="d-block"><a href="/company/{{$hotjob->com_id}}" class="text-muted ps-3 text-decoration-none" style="font-size: 12px;">{{$hotjob->company}}</a></span>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection