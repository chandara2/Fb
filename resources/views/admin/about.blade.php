@extends('layout.layout_admin')
@section('title', 'ABOUT')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">About Us</h1>
        </div>
    </div>

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
                @if ($abouts->isEmpty())
                    <li class="breadcrumb-item" id="add_about_info" style="cursor: pointer;"><a href="{{ route('admin.about.create') }}">Add Information</a></li>
                @endif
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <ul class="list-group list-group-flush mt-3 position-relative">
            @forelse ($abouts as $about)
    
            <li class="list-group-item text-center">
                <img src="{{asset('upload/aboutsbanner/')}}/{{$about->banner}}" alt="banner" class="img-thumbnail">
            </li>
            <li class="list-group-item">
                <div class="text-danger h4">Mission</div>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->mission}}</textarea>
            </li>
            <li class="list-group-item">
                <div class="text-danger h4">Goal</div>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->goal}}</textarea>
            </li>
            <li class="list-group-item">
                <div class="text-danger h4">Value</div>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->value}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Email</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->email}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Phone</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->phone}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Social Media</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->social}}</textarea>
            </li>
            <li class="list-group-item">
                <span class="text-danger h4">Operating Hours</span>
                <textarea disabled class="textarea_autosize form-control border-0 bg-white">{{$about->operating}}</textarea>
            </li>
            <a href="/admin/aboutus/{{$about->id}}/edit" class="position-absolute end-0 top-0"><i class="fas fa-users-cog"></i></a>
    
            @empty
                <p class="text-center alert alert-info">About us don't have information</p>
            @endforelse

        </ul>
    </div>
    
@endsection



