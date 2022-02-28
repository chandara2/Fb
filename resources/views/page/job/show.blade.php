@extends('layout.layout_app')
@section('title', 'SINGLE JOB')
@section('style')
    <style>
        .company_hover{
            text-decoration: none;
            color: black;
            font-size: 20px;
        }
        .company_hover:hover{
            text-decoration: underline;
            color: darkblue;
        }
        .ul_browsejobs{
            column-count: 2;
        }
        @media only screen and (max-width: 991px) {
            .ul_browsejobs{
                column-count: 1;
            }
        }
    </style>
@endsection
@section('content')


<div class="container">
    @foreach ($jobcompanys as $jobcompany)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row"> <!-- Top info -->
                <div class="col-md-6">
                    <h2>
                        @if (app()->getLocale() == 'ch')
                        {{$jobcompany->title_ch}}
                        @elseif(app()->getLocale() == 'en')
                        {{$jobcompany->title_en}}
                        @elseif(app()->getLocale() == 'kh')
                        {{$jobcompany->title_kh}}
                        @else
                        {{$jobcompany->title_th}}
                        @endif
                    </h2>
                    <p><a href="/company/{{$jobcompany->ciid}}" class="text-decoration-none text-dark"><i class="bi bi-building"></i> {{$jobcompany->company}}</a></p>
                    <h2 class="text-danger">
                        @if (app()->getLocale() == 'ch')
                            {{ $jobcompany->salary_ch }}
                        @elseif(app()->getLocale() == 'en')
                            {{ $jobcompany->salary_en }}
                        @elseif(app()->getLocale() == 'kh')
                            {{ $jobcompany->salary_kh }}
                        @else
                            {{ $jobcompany->salary_th }}
                        @endif
                    </h2>
                    <p class="text-danger">Closing Date: {{$jobcompany->expired_job}}</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-8"> <!-- Table & more job -->
                    <table class="table border">
                        <tr>
                            <th class="table-primary">{{ __('text.Job_title') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->title_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->title_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->title_kh}}
                                @else
                                {{$jobcompany->title_th}}
                                @endif
                            </td>
                            <th class="table-primary">{{ __('text.Term') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->term_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->term_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->term_kh}}
                                @else
                                {{$jobcompany->term_th}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="table-primary">{{ __('text.Salary') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->salary_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->salary_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->salary_kh}}
                                @else
                                {{$jobcompany->salary_th}}
                                @endif
                            </td>
                            <th class="table-primary">{{ __('text.Sex') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->gender_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->gender_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->gender_kh}}
                                @else
                                {{$jobcompany->gender_th}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="table-primary">{{ __('text.Location') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->location_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->location_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->location_kh}}
                                @else
                                {{$jobcompany->location_th}}
                                @endif
                            </td>
                            <th class="table-primary">{{ __('text.Age') }}</th>
                            <td>{{$jobcompany->age}}</td>
                        </tr>
                        <tr>
                            <th class="table-primary">{{ __('text.Language') }}</th>
                            <td>{{$jobcompany->language}}</td>
                            <th class="table-primary">{{ __('text.Hiring') }}</th>
                            <td>{{$jobcompany->hiring}}</td>
                        </tr>
                        <tr>
                            <th class="table-primary">{{ __('text.Function') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->function_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->function_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->function_kh}}
                                @else
                                {{$jobcompany->function_th}}
                                @endif
                            </td>
                            <th class="table-primary">{{ __('text.Industry') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->industry_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->industry_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->industry_kh}}
                                @else
                                {{$jobcompany->industry_th}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="table-primary">{{ __('text.Qualification') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->qualification_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->qualification_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->qualification_kh}}
                                @else
                                {{$jobcompany->qualification_th}}
                                @endif
                            </td>
                            <th class="table-primary">{{ __('text.Year_of_experience') }}</th>
                            <td>
                                @if(app()->getLocale() == 'ch')
                                {{$jobcompany->experience_ch}}
                                @elseif(app()->getLocale() == 'en')
                                {{$jobcompany->experience_en}}
                                @elseif(app()->getLocale() == 'kh')
                                {{$jobcompany->experience_kh}}
                                @else
                                {{$jobcompany->experience_th}}
                                @endif
                            </td>
                        </tr>
                    </table>

                    <h5 class="mt-4 underline_highlight">{{ __('text.Job_description_requirements') }}</h5>
                    <!-- Summernote -->
                    @php
                        echo $jobcompany->detail
                    @endphp
                    <!-- Summernote -->
                    <h5 class="mt-4 underline_highlight">{{ __('text.Company_profile') }}</h5>
                    <!-- Summernote -->
                        @php
                            echo $jobcompany->company_profile
                        @endphp
                    <!-- Summernote -->
                    {{-- <textarea disabled class="textarea_autosize form-control border-0 bg-light">{{$jobcompany->company_profile}}</textarea> --}}

                    <h5 class="underline_highlight">{{ __('text.Contact_information') }}</h5>
                    <img src="{{asset('asset/image/user2.png')}}" alt="" width="65" class="mb-2">
                    <div><i class="bi bi-phone-vibrate"></i>&nbsp;{{$jobcompany->contact_phone}}</div>
                    <div><i class="bi bi-envelope"></i>&nbsp;{{$jobcompany->contact_email}}</div>
                </div>
                <div class="col-lg-4"> <!-- Company & Hotjob -->
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
                                    <span class="position-relative"><a href="/job/{{$hotjob->job_id}}" class="text-dark ps-3 text-decoration-none">{{Str::limit($hotjob->title_en , 30)}}</a></span>
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