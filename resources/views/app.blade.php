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
                <div class="col-xl-8 col-lg-12">

                    <div id="slick1"> <!-- Slider 1 -->
                        @foreach ($homepage_slide as $slide)
                        <div class="slide-item1 d-flex justify-content-around border border-white"><img src="{{asset('upload/homepageslide/')}}/{{$slide->slide}}" alt="slide" width="100%" height='352' style="object-fit:cover;"></div>
                        @endforeach
                    </div>

                    <div class="mb-4"> <!-- Browse Job Sort -->
                        <ul class="nav nav-tabs d-flex justify-content-between mt-4">
                            <li class="nav-item h5">{{__('text.Browse_Jobs')}}</li>
                            {{-- <li></li> --}}
                            <li class="nav-item">
                                <a href="#function" class="nav-link active px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Function')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#industry" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Industry')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#location" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Location')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#salary" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('text.Salary')}}</a>
                            </li>
                        </ul>
        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="function">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2"> <!-- Function Sort -->

                                    @if(app()->getLocale() == 'ch')
                                        @foreach ($function_ch as $function)
                                            <li>
                                                <a href="jobsort/{{ $function->function_ch }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($function->function_ch, 25) }} ({{ $function->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'en')
                                        @foreach ($function_en as $function)
                                            <li>
                                                <a href="jobsort/{{ $function->function_en }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($function->function_en, 25) }} ({{ $function->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'kh')
                                        @foreach ($function_kh as $function)
                                            <li>
                                                <a href="jobsort/{{ $function->function_kh }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($function->function_kh, 25) }} ({{ $function->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'th')
                                        @foreach ($function_th as $function)
                                            <li>
                                                <a href="jobsort/{{ $function->function_th }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($function->function_th, 25) }} ({{ $function->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="industry">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2"> <!-- Industry Sort -->

                                    @if(app()->getLocale() == 'ch')
                                        @foreach ($industry_ch as $industry)
                                            <li>
                                                <a href="jobsort/{{ $industry->industry_ch }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($industry->industry_ch, 25) }} ({{ $industry->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'en')
                                        @foreach ($industry_en as $industry)
                                            <li>
                                                <a href="jobsort/{{ $industry->industry_en }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($industry->industry_en, 25) }} ({{ $industry->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'kh')
                                        @foreach ($industry_kh as $industry)
                                            <li>
                                                <a href="jobsort/{{ $industry->industry_kh }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($industry->industry_kh, 25) }} ({{ $industry->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'th')
                                        @foreach ($industry_th as $industry)
                                            <li>
                                                <a href="jobsort/{{ $industry->industry_th }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($industry->industry_th, 25) }} ({{ $industry->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="location">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2"> <!-- Location Sort -->

                                    @if(app()->getLocale() == 'ch')
                                        @foreach ($location_ch as $location)
                                            <li>
                                                <a href="jobsort/{{ $location->location_ch }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($location->location_ch, 25) }} ({{ $location->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'en')
                                        @foreach ($location_en as $location)
                                            <li>
                                                <a href="jobsort/{{ $location->location_en }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($location->location_en, 25) }} ({{ $location->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'kh')
                                        @foreach ($location_kh as $location)
                                            <li>
                                                <a href="jobsort/{{ $location->location_kh }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($location->location_kh, 25) }} ({{ $location->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'th')
                                        @foreach ($location_th as $location)
                                            <li>
                                                <a href="jobsort/{{ $location->location_th }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($location->location_th, 25) }} ({{ $location->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="salary">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2"> <!-- Salary Sort -->

                                    @if(app()->getLocale() == 'ch')
                                        @foreach ($salary_ch as $salary)
                                            <li>
                                                <a href="jobsort/{{ $salary->salary_ch }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($salary->salary_ch, 25) }} ({{ $salary->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'en')
                                        @foreach ($salary_en as $salary)
                                            <li>
                                                <a href="jobsort/{{ $salary->salary_en }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($salary->salary_en, 25) }} ({{ $salary->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'kh')
                                        @foreach ($salary_kh as $salary)
                                            <li>
                                                <a href="jobsort/{{ $salary->salary_kh }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($salary->salary_kh, 25) }} ({{ $salary->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    @if(app()->getLocale() == 'th')
                                        @foreach ($salary_th as $salary)
                                            <li>
                                                <a href="jobsort/{{ $salary->salary_th }}" class="text-decoration-none text-black">
                                                    {{ Str::limit($salary->salary_th, 25) }} ({{ $salary->count }})
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

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
                    <h4 class="underline_highlight">Featured Employers</h4>

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
                    <h4 class="underline_highlight">Recruitment Agencies</h4>
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
                    <h4 class="underline_highlight">Career Resource</h4>
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
                    <h4 class="underline_highlight">Cooperation Partners</h4>
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

