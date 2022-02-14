@extends('layout.layout_app')
@section('title', 'JOB')
@section('style')
    <style>
        .class_jobs{
            color: #1EA4D9;
        }
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

<div class="container my-3">

    <div class="d-flex">
        <div class="form-group mb-md-3">
            Function
            <select name="industry" value="{{ old('industry') }}" class="form-select">
                <option selected disabled>Select Job Function</option>
                {{-- @foreach ($job_industries as $job_industry)
                    <option>{{ $job_industry->name }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="form-group mb-md-3">
            Term
            <select name="industry" value="{{ old('industry') }}" class="form-select">
                <option selected disabled>Term</option>
                {{-- @foreach ($job_industries as $job_industry)
                    <option>{{ $job_industry->name }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="form-group mb-md-3">
            Experience
            <select name="industry" value="{{ old('industry') }}" class="form-select">
                <option selected disabled>Experience</option>
                {{-- @foreach ($job_industries as $job_industry)
                    <option>{{ $job_industry->name }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="form-group mb-md-3">
            Salary
            <select name="industry" value="{{ old('industry') }}" class="form-select">
                <option selected disabled>Salary</option>
                {{-- @foreach ($job_industries as $job_industry)
                    <option>{{ $job_industry->name }}</option>
                @endforeach --}}
            </select>
        </div>
    </div>
    
    <button class="btn btn-danger">Related Job</button>
    <ul class="list-group list-group-flush">
        @forelse ($jobscoms as $jobscom)
        <li class="list-group-item py-3">
            <div class="row">
                <div class="col-md-8">
                    <a href="/job/{{$jobscom->job_id}}" class="fw-bold job_title">{{ $jobscom->title_en }}</a>
                    @if($jobscom->expired_job>now()->addDays(7)) <span class="bg-warning badge">New</span>
                    @else <span class="bg-danger badge">Urgent</span> @endif
                    <div class="py-1"><a href="/company/{{$jobscom->com_id}}" class="com_name">{{ $jobscom->company }}</a></div>
                    <div style="font-size: 12px;" class="text-muted">{{ $jobscom->term }} | {{ $jobscom->location }} <span class="text-danger px-1">{{ $jobscom->salary }}</span></div>
                </div>
                <div class="col-md-4 text-md-end text-sm-start">{{  date('d \\ M Y', strtotime($jobscom->expired_job)) }}</div>
            </div>
        </li>
        @empty
        <p class="text-center">No results found for <strong class="border-bottom border-warning"> {{ $searchjob }} </strong></p>
        @endforelse
    </ul>

    {{-- Pagination --}}
    <div class="d-flex justify-content-md-end justify-content-sm-center mt-2">
        {{ $jobscoms->links() }}
    </div>
</div>

@endsection

