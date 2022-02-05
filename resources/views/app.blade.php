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
        .class_homepage{
            color: blue;
        }
        .slick-wrapper {
            width: 80%;
            background-color: aqua;
        }
        .slide-item {
            background-color: rebeccapurple;
            color: aqua;
            display: flex !important;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 200px;
            border: 1px solid white;
        }
        .slide-item h3 {
            font-family: Lato, sans-serif;
            font-size: 40px;
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
                        <div class="item">
                            <img src="{{ asset('asset/image/city.jpg') }}" alt="slide" height='250' style="object-fit:cover;">
                        </div>
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
                                    @foreach ($job_functions as $job_function=>$counter)
                                        <li><a href="job" class="text-decoration-none text-black">{{Str::limit($job_function, 25)}} ({{$counter}})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="industry">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_industries as $job_industry => $counter)
                                        <li><a href="job" class="text-decoration-none text-black">{{Str::limit($job_industry, 25)}} ({{$counter}})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="location">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_locations as $job_location => $counter)
                                        <li><a href="job" class="text-decoration-none text-black">{{Str::limit($job_location, 25)}} ({{$counter}})</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="salary">
                                <ul class="list-unstyled ul_browsejobs p-lg-2 p-sm-2">
                                    @foreach ($job_salaries as $job_salary => $counter)
                                        <li><a href="job" class="text-decoration-none text-black">{{Str::limit($job_salary, 25)}} ({{$counter}})</a></li>
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
                    {{-- <div class="slider_custom2 owl-carousel owl-theme">
                        @foreach ($companylogos as $companylogo)
                            <div class="item">
                                <a href="company/{{$companylogo->id}}"><img src="upload/companylogo/{{$companylogo->logo}}" alt="CompanyLogo"></a>
                            </div>
                        @endforeach
                    </div> --}}

                    

                    <div class="slick-wrapper">
                        <div id="slick1">
                            <div class="slide-item"><h3>1</h3></div>
                            <div class="slide-item"><h3>2</h3></div>
                            <div class="slide-item"><h3>3</h3></div>
                            <div class="slide-item"><h3>4</h3></div>
                            <div class="slide-item"><h3>5</h3></div>
                            <div class="slide-item"><h3>6</h3></div>
                            <div class="slide-item"><h3>7</h3></div>
                            <div class="slide-item"><h3>8</h3></div>
                            <div class="slide-item"><h3>9</h3></div>
                            <div class="slide-item"><h3>10</h3></div>
                            <div class="slide-item"><h3>11</h3></div>
                            <div class="slide-item"><h3>12</h3></div>
                            <div class="slide-item"><h3>13</h3></div>
                            <div class="slide-item"><h3>14</h3></div>
                            <div class="slide-item"><h3>15</h3></div>
                            <div class="slide-item"><h3>16</h3></div>
                            <div class="slide-item"><h3>17</h3></div>
                            <div class="slide-item"><h3>18</h3></div>
                            <div class="slide-item"><h3>19</h3></div>
                            <div class="slide-item"><h3>20</h3></div>
                            <div class="slide-item"><h3>21</h3></div>
                            <div class="slide-item"><h3>22</h3></div>
                            <div class="slide-item"><h3>23</h3></div>
                            <div class="slide-item"><h3>24</h3></div>
                            <div class="slide-item"><h3>25</h3></div>
                            <div class="slide-item"><h3>26</h3></div>
                            <div class="slide-item"><h3>27</h3></div>
                            <div class="slide-item"><h3>28</h3></div>
                        </div>
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
        $('#slick1').slick({
            rows: 3,
            dots: false,
            arrows: true,
            infinite: true,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 6
        });

        $('.slider_custom1').owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:10000,
            autoplaySpeed: 1000,
            smartSpeed: 1000,
            autoplayHoverPause:true,
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
            autoplayTimeout:5000,
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
            autoplayTimeout:5000,
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
            autoplayTimeout:5000,
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
