@extends('layout.layout_app')
@section('title', 'JOB')
@section('style')
    <style>
        .class_jobs{
            color: blue;
        }
    </style>
@endsection
@section('content')

<div class="container">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<div class="container my-3">
    <button class="btn btn-danger">Related Job</button>

    <ul class="list-group list-group-flush">
        @foreach ($jobs as $job)
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-8">
                    <p>{{ $job->title }} @if($job->expired_job>now()->addDays(7))<span class="bg-warning badge">New</span>@else <span class="bg-danger badge">Urgent</span> @endif</p>
                    <p>{{ $job->location }}</p>
                    <p>{{ $job->term }}|{{ $job->location }} <span class="text-danger px-3">{{ $job->salary }}</span></p>
                </div>
                <div class="col-md-4">{{ $job->expired_job }}</div>
            </div>
        </li>
        @endforeach
    </ul>


    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $jobs->links() }}
    </div>


@endsection