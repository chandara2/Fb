@extends('layout.layout_app')
@section('title', 'ABOUT US')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('alert'))
            <div class="alert alert-info">{{session('alert')}}</div>
            @endif
            {{-- end alert --}}
            <div id="wrap_agency_profile" class="position-relative">
                @if (auth()->user()!=null && $companys->isEmpty())
                    @include('agency.create')
                @else
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
                            {{-- <img src="{{asset('asset/image/login.png')}}" alt="" width="65"> --}}
                            <i class="bi bi-person-circle text-info" style="font-size: 65px;"></i>
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
                @endif
                {{-- end auth && agency --}}
            </div>

            @if ($jobs->isEmpty())
                <div id="create_job_btn">
                    <a
                        href="{{route('jobs.create')}}"
                        class="btn text-primary ps-0"
                        style="text-decoration: none;">
                        <i class="fas fa-plus blink_text_color"></i> Create Job</a>
                </div>
            @else
                {{-- <div class="bg-primary" style="height: 3px">.</div> --}}
                <h3 class="my-5">Job Posting List</h3>
                @if (auth()->user()!=null && auth()->user()->gid==2)
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Agency Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Job Posting List</li>
                            <li class="breadcrumb-item active"><a href="{{route('jobs.create')}}">Create New Job</a></li>
                        </ol>
                    </nav>
                    <table class="custom_datatable table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Job title</th>
                                <th>Salary</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->salary}}</td>
                                <td>
                                    @if ($item->expired_job<now())
                                    <span class="text-danger">{{$item->expired_job}}</span>
                                    @else
                                    {{$item->expired_job}}
                                    @endif
                                </td>
                                <td>
                                    <a href="/agency/jobs/{{$item->id}}/edit" class="btn text-secondary"><i class="far fa-edit text-primary"></i> Edit</a>
                                    {{-- <a href="jobs/{{ $item->id }}/edit" class="btn text-primary">Edit &rarr;</a> --}}
                                    <form action="/agency/jobs/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn text-secondary"><i class="fas fa-trash-alt text-danger"></i> Delete</button>
                                    </form>
                                    <a href="/agency/jobs/{{$item->id}}" class="btn text-secondary"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Job title</th>
                                <th>Salary</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($jobs as $job)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><a href="/job/{{$job->job_id}}" class="text-dark text-decoration-none">{{$job->title}} </a><span class="badge bg-danger rounded-pill">Urgent</span></p>
                                        <cite style="font-size: 13px;">{{$job->term}} | {{$job->location}} <span class="text-danger">{{$job->salary}}</span></cite>
                                    </div>
                                    <div class="col-md-2">
                                        <p>{{$job->expired_job}}</p>
                                        <p class="btn btn-outline-primary btn-sm py-0" style="font-size: 12px;">Apply Now</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
                {{-- end auth()->user()!=null --}}
            @endif
            {{-- end jobs --}}
        </div>
    </div>
</div>

@endsection