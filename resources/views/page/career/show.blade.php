@extends('layout.layout_app')
@section('title', 'CAREER')
@section('style')
    <style>
        .class_career{
            color: #1EA4D9;
        }
    </style>
@endsection
@section('content')

    <div class="container my-5">
        <div class="px-3">
            <div class="row gx-5">
                @foreach ( $careers as $career )
                <div class="col-md-8 bg-white">
                    <h2 class="my-3">{{ $career->title_ch }}</h2>
                    <img src="{{asset('asset/image/slide2.jpg')}}" alt="" width="100%" height="350" style="object-fit: contain;">
                    <div class="my-3">
                        @php
                            echo substr($career->post_ch, 0, 400)
                        @endphp
                    </div>
                </div>
                @endforeach
                <div class="col-md-4">
                    <div class="bg-white">
                        <p class="ms-3 pt-3 fw-bold h5">Popular Article</p>
                        <ul class="list-group list-group-flush">
                            @foreach ( $careers_last as $last )
                            <li class="list-group-item">
                                {{ $last->title_en }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    

@endsection