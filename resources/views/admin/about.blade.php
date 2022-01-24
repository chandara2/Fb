@extends('layout.layout_admin')
@section('title', 'ABOUT')

@section('content')

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
                <li class="breadcrumb-item"><a href="#
                    {{-- @if (auth()->user()!=null && $company_infos->isEmpty())
                    {{ route('admin.companyinfo.create') }}
                    @else
                    {{ route('admin.job.create') }}
                    @endif" class="text-decoration-none" --}}
                    ">New Job</a></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">

    </div>
    
@endsection