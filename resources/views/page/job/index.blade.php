@extends('layout.layout_app')
@section('title', 'JOB')
@section('style')
    <style>
        .job_title{
            color: #333;
            text-decoration: none;
        }
        .job_title:hover{
            text-decoration: underline;
        }
        .com_name{
            text-decoration: none;
        }
        .com_name:hover{
            text-decoration: underline;
        }
    </style>
@endsection
@section('content')

    @if($job_count==0)
        <p class="text-center">No​​​ result to show</p>
    @else
        <div class="container my-3">

            <div class="d-flex">
                <div class="form-group mb-md-3">
                    Function
                    <select name="industry" value="{{ old('industry') }}" class="form-select">
                        <option selected disabled>Select Job Function</option>
                    </select>
                </div>
                <div class="form-group mb-md-3">
                    Term
                    <select name="industry" value="{{ old('industry') }}" class="form-select">
                        <option selected disabled>Term</option>
                    </select>
                </div>
                <div class="form-group mb-md-3">
                    Experience
                    <select name="industry" value="{{ old('industry') }}" class="form-select">
                        <option selected disabled>Experience</option>
                    </select>
                </div>
                <div class="form-group mb-md-3">
                    Salary
                    <form action="{{ route('searchjob') }}">
                        <select name="salary" value="{{ old('salary') }}" class="form-select" id="salarysid" type="input" onchange="this.form.submit()"> 
                            <option selected disabled>Salary</option>
                            {{-- @foreach ($salarys as $salary)
                                <option>{{ $salary->salary_en }}</option>
                            @endforeach --}}
                        </select>
                    </form>
                </div>
            </div>

            <nav class="nav nav-pills" id="pills-tab" role="tablist">
                <a class="nav-link active" id="pills-relatedjobs-tab" data-bs-toggle="pill" href="#pills-relatedjobs" role="tab" aria-controls="pills-relatedjobs" aria-selected="true">{{ __('text.Related_jobs') }}
                <a class="nav-link" id="pills-urgentjobs-tab" data-bs-toggle="pill" href="#pills-urgentjobs" role="tab" aria-controls="pills-urgentjobs" aria-selected="false">{{ __('text.Urgent_jobs') }}</a>
            </nav>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-relatedjobs" role="tabpanel" aria-labelledby="pills-relatedjobs-tab">
                    
                    <ul class="list-group list-group-flush">
                        @forelse ($jobscoms as $jobscom)
                        <li class="list-group-item py-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="/job/{{$jobscom->job_id}}" class="fw-bold job_title">
                                        @if (app()->getLocale() == 'ch')
                                            {{ $jobscom->title_ch }}
                                        @elseif(app()->getLocale() == 'en')
                                            {{ $jobscom->title_en }}
                                        @elseif(app()->getLocale() == 'kh')
                                            {{ $jobscom->title_kh }}
                                        @else
                                            {{ $jobscom->title_th }}
                                        @endif
                                    </a>
                                    @if($jobscom->expired_job>now()->addDays(7)) <span class="bg-warning badge">New</span>
                                    @else <span class="bg-danger badge">Urgent</span> @endif
                                    <div class="py-1"><a href="/company/{{$jobscom->com_id}}" class="com_name">{{ $jobscom->company }}</a></div>
                                    <div style="font-size: 12px;" class="text-muted">{{ $jobscom->term }} | 
                                        @if (app()->getLocale() == 'ch')
                                            {{ $jobscom->location_ch }}
                                        @elseif(app()->getLocale() == 'en')
                                            {{ $jobscom->location_en }}
                                        @elseif(app()->getLocale() == 'kh')
                                            {{ $jobscom->location_kh }}
                                        @else
                                            {{ $jobscom->location_th }}
                                        @endif
                                        <span class="text-danger px-1">
                                            @if (app()->getLocale() == 'ch')
                                                {{ $jobscom->salary_ch }}
                                            @elseif(app()->getLocale() == 'en')
                                                {{ $jobscom->salary_en }}
                                            @elseif(app()->getLocale() == 'kh')
                                                {{ $jobscom->salary_kh }}
                                            @else
                                                {{ $jobscom->salary_th }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-end text-sm-start">{{  date('d \\ M Y', strtotime($jobscom->expired_job)) }}</div>
                            </div>
                        </li>
                        @empty
                            <p class="text-center">{{ __('text.No_results_found_for') }} <strong class="border-bottom border-warning"> {{ $searchjob }} </strong></p>
                        @endforelse
                    </ul>
        
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-md-end justify-content-sm-center mt-2">
                        {{ $jobscoms->links() }}
                    </div>

                </div>
                <div class="tab-pane fade" id="pills-urgentjobs" role="tabpanel" aria-labelledby="pills-urgentjobs-tab">
                    <ul class="list-group list-group-flush">
                        @forelse ($job_urgent as $jobscom)
                        <li class="list-group-item py-3">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="/job/{{$jobscom->job_id}}" class="fw-bold job_title">
                                        @if (app()->getLocale() == 'ch')
                                            {{ $jobscom->title_ch }}
                                        @elseif(app()->getLocale() == 'en')
                                            {{ $jobscom->title_en }}
                                        @elseif(app()->getLocale() == 'kh')
                                            {{ $jobscom->title_kh }}
                                        @else
                                            {{ $jobscom->title_th }}
                                        @endif
                                    </a>
                                    @if($jobscom->expired_job>now()->addDays(7)) <span class="bg-warning badge">New</span>
                                    @else <span class="bg-danger badge">Urgent</span> @endif
                                    <div class="py-1"><a href="/company/{{$jobscom->com_id}}" class="com_name">{{ $jobscom->company }}</a></div>
                                    <div style="font-size: 12px;" class="text-muted">{{ $jobscom->term }} | 
                                        @if (app()->getLocale() == 'ch')
                                            {{ $jobscom->location_ch }}
                                        @elseif(app()->getLocale() == 'en')
                                            {{ $jobscom->location_en }}
                                        @elseif(app()->getLocale() == 'kh')
                                            {{ $jobscom->location_kh }}
                                        @else
                                            {{ $jobscom->location_th }}
                                        @endif
                                        <span class="text-danger px-1">
                                            @if (app()->getLocale() == 'ch')
                                                {{ $jobscom->salary_ch }}
                                            @elseif(app()->getLocale() == 'en')
                                                {{ $jobscom->salary_en }}
                                            @elseif(app()->getLocale() == 'kh')
                                                {{ $jobscom->salary_kh }}
                                            @else
                                                {{ $jobscom->salary_th }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-end text-sm-start">{{  date('d \\ M Y', strtotime($jobscom->expired_job)) }}</div>
                            </div>
                        </li>
                        @empty
                            <p class="text-center">No​​​ result to show</p>
                        @endforelse
                    </ul>
        
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-md-end justify-content-sm-center mt-2">
                        {{ $job_urgent->links() }}
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    @endif

@endsection

@section('script')
    <script>
        // $(document).ready(function () {
        //     $(document).on('change', '#salarysid', function () {
        //         $sv = $(this).val()
        //         $.ajax({
        //             type: "POST",
        //             url: "url",
        //             data: "data",
        //             dataType: "dataType",
        //             success: function (response) {
                        
        //             }
        //         });
        //     });
        // });
    </script>
@endsection

