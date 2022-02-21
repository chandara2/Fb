@extends('layout.layout_app')
@section('title', 'APP')
@section('style')
    <style>
        .ul_browsejobs{
            column-count: 3;
        }
        @media only screen and (max-width: 991px) {
            .ul_browsejobs{
                column-count: 2;
            }
        }
        @media only screen and (max-width: 575px) {
            .ul_browsejobs{
                column-count: 1;
            }
        }
        .limit_str_jobcompany{
            display: block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .slick-prev{
            left: 10px;
            z-index: 999;
        }
        .slick-next{
            right: 10px;
            z-index: 999;
        }
        .slick-dots{
            bottom: 10px;
            z-index: 999;
        }
    </style>
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row mb-5 mb-md-0">
                <div class="col-xl-8 col-lg-12"><!-- Slider 1 -->

                    <div id="slick1">
                        @foreach ($homepage_slide as $slide)
                        <div class="slide-item1 d-flex justify-content-around border border-white"><img src="{{asset('upload/homepageslide/')}}/{{$slide->slide}}" alt="slide" width="100%" height='352' style="object-fit:cover;"></div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <ul class="nav nav-tabs d-flex justify-content-between mt-4">
                            <li class="nav-item h5">{{__('text.Browse_Jobs')}}</li>
                            {{-- <li></li> --}}
                            <li class="nav-item">
                                <a href="#function" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Function')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#industry" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Industry')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#location" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Location')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#salary" class="nav-link active px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Salary')}}</a>
                            </li>
                        </ul>
        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="function">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">

                                    @foreach ($job_functions as $function)
                                        <li><a href="jobsort/{{ $function->function_en }}" class="text-decoration-none text-black">
                                                @if (app()->getLocale() == 'ch')
                                                    {{ Str::limit($function->function_ch, 25) }}
                                                @elseif(app()->getLocale() == 'en')
                                                    {{ Str::limit($function->function_en, 25) }}
                                                @elseif(app()->getLocale() == 'kh')
                                                    {{ Str::limit($function->function_kh, 25) }}
                                                @else
                                                    {{ Str::limit($function->function_th, 25) }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="industry">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">

                                    @foreach ($job_industries as $industry)
                                        <li><a href="jobsort/{{ $industry->industry_en }}" class="text-decoration-none text-black">
                                                @if (app()->getLocale() == 'ch')
                                                    {{ Str::limit($industry->industry_ch, 25) }}
                                                @elseif(app()->getLocale() == 'en')
                                                    {{ Str::limit($industry->industry_en, 25) }}
                                                @elseif(app()->getLocale() == 'kh')
                                                    {{ Str::limit($industry->industry_kh, 25) }}
                                                @else
                                                    {{ Str::limit($industry->industry_th, 25) }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="location">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_locations as $location)
                                        <li><a href="jobsort/{{ $location->location_en }}" class="text-decoration-none text-black">
                                                @if (app()->getLocale() == 'ch')
                                                    {{ Str::limit($location->location_ch, 25) }}
                                                @elseif(app()->getLocale() == 'en')
                                                    {{ Str::limit($location->location_en, 25) }}
                                                @elseif(app()->getLocale() == 'kh')
                                                    {{ Str::limit($location->location_kh, 25) }}
                                                @else
                                                    {{ Str::limit($location->location_th, 25) }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="salary">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_salaries as $salary)
                                        <li>
                                            <a href="jobsort/{{ $salary->salary_en }}" class="text-decoration-none text-black">
                                                @if (app()->getLocale() == 'ch')
                                                    {{ Str::limit($salary->salary_ch, 25) }}
                                                @elseif(app()->getLocale() == 'en')
                                                    {{ Str::limit($salary->salary_en, 25) }}
                                                @elseif(app()->getLocale() == 'kh')
                                                    {{ Str::limit($salary->salary_kh, 25) }}
                                                    {{-- ({{ count((array)$salary->salary_en) }}) --}}
                                                @else
                                                    {{ Str::limit($salary->salary_th, 25) }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-12 mb-xl-0"><!-- Job Augent -->
                    <ul class="list-group">
                        
                        <li class="list-group-item active text-uppercase" aria-current="true" style="background: #1EA4D9; border: 1px solid #1EA4D9;">{{ __('text.Urgent_jobs') }}</li>
                        @foreach ($jobcompanys as $jobcompany)
                            <li class="list-group-item limit_str_jobcompany ps-0 py-1">
                                <span class="position-relative"><a href="job/{{ $jobcompany->jobid }}" class="text-dark ps-3 text-decoration-none">
                                    @if (app()->getLocale() == 'ch')
                                    {{$jobcompany->title_ch}}
                                    @elseif(app()->getLocale() == 'en')
                                    {{$jobcompany->title_en}}
                                    @elseif(app()->getLocale() == 'kh')
                                    {{$jobcompany->title_kh}}
                                    @else
                                    {{$jobcompany->title_th}}
                                    @endif
                                </a></span> -
                                <span><a href="company/{{$jobcompany->com_id}}" class="text-danger ps-0 text-decoration-none">{{$jobcompany->cic}}</a></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row mb-5 mt-xl-1 mt-md-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink;">Featured Employers</h4>

                    <div class="slick-wrapper w-100 bg-white">
                        <div id="slick2">
                            @foreach ($companylogos as $companylogo)
                            <div class="slide-item2 py-3 d-flex justify-content-around border border-white">
                                <a href="company/{{$companylogo->id}}"><img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo" height="65" width="65" style="object-fit: contain;"></a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink;">Recruitment Agencies</h4>
                    <div id="slick3">
                        @foreach ($companylogos as $companylogo)
                        <div class="slide-item3 py-3 d-flex justify-content-around border border-white">
                            <a href="company/{{$companylogo->id}}"><img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo" width="65" height="65" style="object-fit: cover;"></a>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink;">Career Resource</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="bg-white rounded p-3">
                                <i class="bi bi-person-workspace text-info"></i>
                                <span>CV & Cover Letters</span>
                                <div class="border border-bottom my-3"></div>
                                <ul class="list-unstyled">
                                    <li>How to Write a Cover Letter for a Recruitment Consultant</li>
                                    <li>How to write a CV when you have no work experience</li>
                                    <li>How to Write a CV Career Summary</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white rounded p-3">
                                <i class="bi bi-boxes text-primary"></i>
                                <span>CV Samples</span>
                                <div class="border border-bottom my-3"></div>
                                <ul class="list-unstyled">
                                    <li>CURRICULUME VITAE</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-white rounded p-3">
                                <i class="bi bi-chat-dots text-success"></i>
                                <span>Interview Tips</span>
                                <div class="border border-bottom my-3"></div>
                                <ul class="list-unstyled">
                                    <li>How to Face an Interview</li>
                                    <li>How to Perform Well in a Group Interview</li>
                                    <li>How to Prepare for a Video Interview at Home</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink;">Cooperation Partners</h4>
                    <div id="slick4">
                        @foreach ($companylogos as $companylogo)
                        <div class="slide-item4 py-3 d-flex justify-content-around border border-white">
                            <a href="company/{{$companylogo->id}}"><img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo" width="65" height="65" style="object-fit: cover;"></a>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div><!-- end container -->
    </main>
@endsection

@section('script')
    <script>
        $('#slick1').slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 1500,
            autoplay: true,
            autoplaySpeed: 7000,
            slidesToShow: 1,
        });

        $('#slick2').slick({
            rows: 1,
            arrows: false,
            infinite: true,
            speed: 1500,
            autoplay: true,
            autoplaySpeed: 7000,
            slidesToShow: 5,
            responsive: [
                {
                breakpoint: 1200,
                    settings: {
                        slidesToShow: 5,
                    },
                },
                {
                breakpoint: 1008,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                    },
                },
            ],
        });

        $('#slick3').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            // autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 5,
        });

        $('#slick4').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            // autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 5,
        }); 
    </script>
@endsection

