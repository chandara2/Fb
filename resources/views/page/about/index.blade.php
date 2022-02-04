@extends('layout.layout_app')
@section('title', 'ABOUT US')
@section('style')
    <style>
        .class_aboutus{
            color: blue;
        }
    </style>
@endsection
@section('content')

@forelse ( $abouts as $about )
<section>
    <div class="position-relative">
        <img src="{{asset('upload/aboutsbanner/')}}/{{$about->banner}}" alt="" width="100%" height="400" style="object-fit: cover; filter: brightness(0.30);">
        <span class="position-absolute top-50 start-50 translate-middle-x h1 text-light" style="text-shadow: 2px 2px #000;">{{__('text.n1jic')}}</span>
    </div>
</section>

<section>
    <div class="container mt-5">
        <p class="h4 text-decoration-underline">Our Mission</p>
        <textarea disabled class="textarea_autosize form-control border-0 bg-light">{{$about->mission}}</textarea>
    </div>
</section>

<section>
    <div class="container">
        <p class="h4 text-decoration-underline mt-3">Goals</p>
        <textarea disabled class="textarea_autosize form-control border-0 bg-light">{{$about->goal}}</textarea>
        <p class="h4 text-decoration-underline mt-3">Values</p>
        <textarea disabled class="textarea_autosize form-control border-0 bg-light">{{$about->value}}</textarea>
    </div>
</section>

<section>
    <div class="container">
        <p class="h4 text-center text-decoration-underline mt-3">Contact Us</p>
        <div class="row">

            <div class="col-md-4">
                <p class="fw-bold">Jobs Posting Email</p>
                <p>{{$about->email}}</p>
            </div>

            <div class="col-md-4">
                <p class="fw-bold">Service Hotline</p>
                <p>{{$about->phone}}</p>
            </div>

            <div class="col-md-4">
                <p class="fw-bold">Our Address</p>
                <p>{{$about->address}}</p>
            </div>

        </div>
    </div>
</section>

<section>
    <div class="container">
        <p class="h4 text-decoration-underline mt-3">Map Company</p>
    </div>
</section>
@empty
<p class="text-center">No About us Data</p>
@endforelse

@endsection