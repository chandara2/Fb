@extends('layout.layout_app')
@section('title', 'APP')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8"><!-- Slider 1 -->
                    <div class="slider_custom1 owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('asset/image/mountain.jpg') }}" alt="slide" height='200' style="object-fit:cover;">
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
                                <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                                    @foreach ($job_functions as $job_function=>$counter)
                                        <li>{{Str::limit($job_function, 25)}} ({{$counter}})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="industry">
                                <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                                    @foreach ($job_industries as $job_industry => $counter)
                                        <li>{{Str::limit($job_industry, 25)}} ({{$counter}})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="location">
                                <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                                    @foreach ($job_locations as $job_location => $counter)
                                        <li>{{Str::limit($job_location, 25)}} ({{$counter}})</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="salary">
                                <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                                    @foreach ($job_salaries as $job_salary => $counter)
                                        <li>{{Str::limit($job_salary, 25)}} ({{$counter}})</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-4"><!-- Job Augent -->
                    <ul class="list-group">
                        <li class="list-group-item active bg-info border-info" aria-current="true">JOB AUGENT</li>
                        @foreach ($jobcompanys as $jobcompany)
                            <li class="list-group-item limit_str_jobcompany ps-0 py-0">
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

            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Employers</h4>

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
    </script>
@endsection