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
    </style>
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12"><!-- Slider 1 -->

                    <div id="slick1">
                        @foreach ($companylogos as $companylogo)
                        <div class="slide-item1 d-flex justify-content-around border border-white"><img src="{{ asset('asset/image/slide1.jpg') }}" alt="slide" width="100%" height='250' style="object-fit:cover;"></div>
                        <div class="slide-item1 d-flex justify-content-around border border-white"><img src="{{ asset('asset/image/slide2.jpg') }}" alt="slide" width="100%" height='250' style="object-fit:cover;"></div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <ul class="nav nav-tabs d-flex justify-content-between mt-4">
                            <li class="nav-item">{{__('text.Browse_Jobs')}}</li>
                            <li></li>
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
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">

                                    @foreach ($job_functions as $function=>$count)
                                        <li><a href="jobsort/{{ $function }}" class="text-decoration-none text-black">{{Str::limit($function, 25)}} ({{ $count }})</a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="industry">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">

                                    @foreach ($job_industries as $industry=>$count)
                                        <li><a href="jobsort/{{ $industry }}" class="text-decoration-none text-black">{{Str::limit($industry, 25)}} ({{ $count }})</a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="location">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_locations as $location=>$count)
                                        <li><a href="jobsort/{{ $location }}" class="text-decoration-none text-black">{{Str::limit($location, 25)}} ({{ $count }})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="salary">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_salaries as $salary=>$count)
                                        <li><a href="jobsort/{{ $salary }}" class="text-decoration-none text-black">{{Str::limit($salary, 25)}} ({{ $count }})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-xl-4 col-lg-12"><!-- Job Augent -->
                    <ul class="list-group">
                        <li class="list-group-item active bg-info border-info" aria-current="true">JOB AUGENT</li>
                        @foreach ($jobcompanys as $jobcompany)
                            <li class="list-group-item limit_str_jobcompany ps-0 py-1">
                                <span class="position-relative"><a href="job/{{ $jobcompany->jobid }}" class="text-dark ps-3 text-decoration-none">{{$jobcompany->title}}</a></span> -
                                <span><a href="company/{{$jobcompany->com_id}}" class="text-danger ps-0 text-decoration-none">{{$jobcompany->company}}</a></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row mb-5 mt-xl-1 mt-lg-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink">Featured Employers</h4>

                    <div class="slick-wrapper w-100 bg-white">
                        <div id="slick2">
                            @foreach ($companylogos as $companylogo)
                            <div class="slide-item2 py-3 d-flex justify-content-around border border-white">
                                <a href="company/{{$companylogo->id}}"><img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo" width="65" height="65" style="object-fit: cover;"></a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink">Recruitment Agencies</h4>
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
                    <h4 style="text-decoration: underline 3px solid pink">Career Resource</h4>
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
                    <h4 style="text-decoration: underline 3px solid pink">Cooperation Partners</h4>
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
            dots: false,
            arrows: false,
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
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 5,
        });

        $('#slick4').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 300,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 5,
        }); 
    </script>
@endsection
