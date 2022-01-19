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
                    <div class="slider_custom1 owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('asset/image/lake.jpg') }}" alt="slide" height='250' style="object-fit:cover;">
                        </div>
                    </div>

                    <div class="mb-4">
                        <ul class="nav nav-tabs d-flex justify-content-between mt-4">
                            <li class="nav-item">{{__('lang_app.browseJobs')}}</li>
                            <li></li>
                            <li class="nav-item">
                                <a href="#function" class="nav-link active px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang_app.function')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#industry" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang_app.industry')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#location" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang_app.location')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#salary" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang_app.salary')}}</a>
                            </li>
                        </ul>
        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="function">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_functions as $job_function=>$counter)
                                        <li>{{Str::limit($job_function, 25)}} ({{$counter}})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="industry">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_industries as $job_industry => $counter)
                                        <li>{{Str::limit($job_industry, 25)}} ({{$counter}})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="location">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_locations as $job_location => $counter)
                                        <li>{{Str::limit($job_location, 25)}} ({{$counter}})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="salary">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_salaries as $job_salary => $counter)
                                        <li>{{Str::limit($job_salary, 25)}} ({{$counter}})</li>
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
                                <span class="position-relative"><a href="
                                    {{-- job/{{$jobcompany->jobid}} --}}
                                    " class="text-dark btn py-0 pe-0">{{$jobcompany->job_title}}</a></span> -
                                <span><a href="
                                    {{-- agency/{{$jobcompany->companyid}} --}}
                                    " class="text-danger btn py-0 ps-0">{{$jobcompany->company}}</a></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row mb-5 mt-xl-1 mt-lg-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink">Featured Employers</h4>
                    <div class="slider_custom2 owl-carousel owl-theme">
                        @foreach ($companylogos as $companylogo)
                            <div class="item">
                                <img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h4 style="text-decoration: underline 3px solid pink">Recruitment Agencies</h4>
                    <div class="slider_custom3 owl-carousel owl-theme">
                        @foreach ($companylogos as $companylogo)
                            <div class="item">
                                <img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo">
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
                    <div class="slider_custom4 owl-carousel owl-theme">
                        @foreach ($companylogos as $companylogo)
                            <div class="item">
                                <img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo">
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
        $('.slider_custom1').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            dots: false,
            responsive:{
                0:{
                    items:1,
                }
            }
        })

        $('.slider_custom2').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            dots: false,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:4
                },
                1000:{
                    items:8
                }
            }
        })

        $('.slider_custom3').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            dots: false,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:4
                },
                1000:{
                    items:8
                }
            }
        })

        $('.slider_custom4').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            dots: false,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:4
                },
                1000:{
                    items:8
                }
            }
        })
    </script>
@endsection