@extends('layout.layout_app')
@section('title', 'AGENCY DB')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Agency</li>
                <li class="breadcrumb-item"><a href="#">Job</a></li>
                <li class="breadcrumb-item"><a href="
                    @if (auth()->user()!=null && $company_infos->isEmpty())
                        {{ route('agency.companyinfo.create') }}
                    @else
                        {{ route('agency.job.create') }}
                    @endif"
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
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-briefcase display-5 text-primary"></i>
                        <h4 class="text-muted">Job Announcement</h4>
                        {{-- <h4 class="text-muted">{{ $jobs }}</h4> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection