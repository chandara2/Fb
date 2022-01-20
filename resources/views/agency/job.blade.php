@extends('layout.layout_app')
@section('title', 'AGENCY JOB')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('agency.dashboard') }}" class="text-decoration-none">Agency</a></li>
                <li class="breadcrumb-item active">Job List</li>
                <li class="breadcrumb-item"><a href="{{ route('agency.job.create') }}"
                    class="text-decoration-none">Make Announcement</a></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Agency<br>Dashboard</h1>
        </div>
    </div>

    <div class="container-fluid">
        @if (session('userdelete'))
            <div class="alert alert-success">{{session('userdelete')}}</div>
        @endif
        
        <table class="customdatatable cell-border" style="width:100%">
            <thead class="brand-bg5">
                <tr>
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Location</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $i => $job)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$job->job_title}}</td>
                    <td>{{$job->location}}</td>
                    <td>{{$job->deadline}}</td>
                    <td>
                        <a href="/agency/job/{{ $job->id }}/edit" class="btn btn-sm"><i class="bi bi-pencil-square text-primary"></i>Edit</a>
                        <form action="/agency/job/{{ $job->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm"><i class="bi bi-trash text-danger"></i>Delete</button>
                        </form>
                        <a href="/agency/job/{{$job->id}}" class="btn btn-sm"><i class="bi bi-exclamation-circle text-info"></i>Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="brand-bg5">
                <tr>
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Location</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div>

@endsection