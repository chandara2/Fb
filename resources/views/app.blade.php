@extends('layout.layout_app')
@section('title', 'APP')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p>APP SLIDE</p>
                    <div class="slider_custom1 owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('asset/image/mountain.jpg') }}" alt="slide" height='150' style="object-fit:cover;">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <p>JOB AUGENT</p>
                </div>
            </div>

            <div class="mb-4">
                <ul class="nav nav-tabs d-flex justify-content-between mt-4">
                    <li class="nav-item">{{__('lang.browse_jobs')}}</li>
                    <li></li>
                    <li class="nav-item">
                        <a href="#function" class="nav-link active px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang.function')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#industry" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang.industry')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#location" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang.location')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#salary" class="nav-link px-2 py-1" role="tab" data-bs-toggle="tab">{{__('lang.salary')}}</a>
                    </li>
                </ul>

                {{-- <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="function">
                        <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                            @foreach ($job_functions as $job_function => $counter)
                                <li>{{Str::limit($job_function, 25)}} ({{$counter}})</li>
                            @endforeach
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="industry">
                        <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                            @foreach ($industrys as $industry => $counter)
                                <li>{{Str::limit($industry, 25)}} ({{$counter}})</li>
                            @endforeach
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="location">
                        <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                            @foreach ($locations as $location => $counter)
                                <li>{{Str::limit($location, 25)}} ({{$counter}})</li>
                            @endforeach
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="salary">
                        <ul class="ul_brows_jobs p-lg-2 p-sm-2">
                            @foreach ($salarys as $salary => $counter)
                                <li>{{Str::limit($salary, 25)}} ({{$counter}})</li>
                            @endforeach
                        </ul>
                    </div>
                </div> --}}
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