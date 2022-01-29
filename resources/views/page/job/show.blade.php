@extends('layout.layout_app')
@section('title', 'SINGLE JOB')

@section('content')


<div class="container">
    @foreach ($jobcompanys as $jobcompany)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h2>{{$jobcompany->title}}</h2>
                    <p>{{$jobcompany->company}}</p>
                    <h2 class="text-danger">{{$jobcompany->salary}}</h2>
                    <p class="text-danger">Closing Date: {{$jobcompany->expired_job}}</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-8">
                    <table class="table border">
                        <tr>
                            <th class="table-light">Level</th>
                            <td>LV NO {{$jobcompany->year_of_exp}}</td>
                            <th class="table-light">Term</th>
                            <td>{{$jobcompany->term}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Year of Exp.</th>
                            <td>{{$jobcompany->year_of_exp}}</td>
                            <th class="table-light">Function</th>
                            <td>{{$jobcompany->function}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Hiring</th>
                            <td>{{$jobcompany->hiring}}</td>
                            <th class="table-light">Industry</th>
                            <td>{{$jobcompany->industry}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Salary</th>
                            <td>{{$jobcompany->salary}}</td>
                            <th class="table-light">Qualification</th>
                            <td>{{$jobcompany->qualification}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Sex</th>
                            <td>{{$jobcompany->sex}}</td>
                            <th class="table-light">Language</th>
                            <td>{{$jobcompany->language}}</td>
                        </tr>
                        <tr>
                            <th class="table-light">Age</th>
                            <td>{{$jobcompany->age}}</td>
                            <th class="table-light">Location</th>
                            <td>{{$jobcompany->location}}</td>
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
                        <h5 class="my-3">{{$jobcompany->company}}</h5>
                        <p><i class="fas fa-map-marker-alt"></i> {{$jobcompany->province}}</p>
                        <p><i class="fas fa-map-marker-alt"></i> {{$jobcompany->detail_location}}</p>
                        <p><i class="far fa-user"></i> {{$jobcompany->number_staff}}</p>
                        <p><i class="fas fa-globe-asia"></i> <a href="{{$jobcompany->website}}">{{$jobcompany->website}}</a></p>
                        @if (auth()->user()!=null)
                            <a href="" class="btn btn-outline-primary">Employer Homepage</a>
                        @endif

                        <ul class="list-group mt-3">
                            <li class="list-group-item active" aria-current="true">Hot Jobs</li>
                            @foreach ($hotjobs as $hotjob)
                                <li class="list-group-item ps-0 py-0">
                                    <span class="position-relative"><a href="/job/{{$hotjob->id}}" class="text-dark ps-3 text-decoration-none">{{Str::limit($hotjob->title , 30)}}</a></span>
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