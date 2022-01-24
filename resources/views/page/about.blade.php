@extends('layout.layout_app')
@section('title', 'ABOUT US')

@section('content')

@forelse ( $aboutus as $item )
<section>
    <div class="position-relative">
        <img src="{{asset('upload/slide/')}}/{{$item->slide}}" alt="" width="100%" height="400" style="object-fit: cover; filter: brightness(0.30);">
        <span class="position-absolute top-50 start-50 translate-middle-x h1 text-light">No.1 Jobsite in Cambodia</span>
    </div>
</section>

<section>
    <div class="container mt-5">
        <p class="h4 text-decoration-underline">Our Mission</p>
        <textarea disabled class="ta_autosize form-control border-0 bg-white">{{$item->mission}}</textarea>
    </div>
</section>

<section>
    <div class="container">
        <p class="h4 text-decoration-underline mt-3">Goals</p>
        <textarea disabled class="ta_autosize form-control border-0 bg-white">{{$item->goal}}</textarea>
        <p class="h4 text-decoration-underline mt-3">Values</p>
        <textarea disabled class="ta_autosize form-control border-0 bg-white">{{$item->value}}</textarea>
    </div>
</section>

<section>
    <div class="container">
        <p class="h4 text-center text-decoration-underline mt-3">Contact Us</p>
        <div class="row">

            <div class="col-md-4">
                <p class="fw-bold">Jobs Posting Email</p>
                <p>{{$item->email}}</p>
            </div>

            <div class="col-md-4">
                <p class="fw-bold">Service Hotline</p>
                <p>{{$item->phone}}</p>
            </div>

            <div class="col-md-4">
                <p class="fw-bold">Our Address</p>
                <p>{{$item->address}}</p>
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
<p>No About us Data</p>

@endsection