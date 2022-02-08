@extends('layout.layout_app')
@section('title', 'JOB')
@section('style')
    <style>
        .class_jobs{
            color: blue;
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

    <form class="d-flex" action="{{ route('searchjobindex') }}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchjobindex">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    
    <button class="btn btn-danger">Related Job</button>

    {{-- @if($searched)
        @foreach ($searched as $rs)
        <p class="bg-danger">{{ $rs->title }}</p>
        @endforeach
    @endif --}}

    <ul class="list-group list-group-flush">
        @foreach ($jobscoms as $jobscom)
        <li class="list-group-item py-3">
            <div class="row">
                <div class="col-md-8">
                    <a href="/job/{{$jobscom->job_id}}" class="fw-bold job_title">{{ $jobscom->title }}</a>
                    @if($jobscom->expired_job>now()->addDays(7)) <span class="bg-warning badge">New</span>
                    @else <span class="bg-danger badge">Urgent</span> @endif
                    <div class="py-1"><a href="/company/{{$jobscom->com_id}}" class="com_name">{{ $jobscom->company }}</a></div>
                    <div style="font-size: 12px;" class="text-muted">{{ $jobscom->term }} | {{ $jobscom->location }} <span class="text-danger px-1">{{ $jobscom->salary }}</span></div>
                </div>
                <div class="col-md-4 text-md-end text-sm-start">{{  date('d \\ M Y', strtotime($jobscom->expired_job)) }}</div>
            </div>
        </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    <div class="d-flex justify-content-md-end justify-content-sm-center mt-2">
        {{ $jobscoms->links() }}
    </div>
</div>

@endsection