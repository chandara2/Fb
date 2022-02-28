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
                    <h2 class="my-3">
                        @if (app()->getLocale() == 'ch')
                            {{ $career->title_ch }}
                        @elseif (app()->getLocale() == 'en')
                            {{ $career->title_en }}
                        @elseif (app()->getLocale() == 'kh')
                            {{ $career->title_kh }}
                        @else
                            {{ $career->title_th }}
                        @endif
                    </h2>
                    <img src="{{asset('upload/blogpost/')}}/{{$career->post_img}}" alt="" width="100%" height="350" style="object-fit: contain;">
                    <div class="my-3">
                        @if (app()->getLocale() == 'ch')
                            @php
                                echo substr($career->post_ch, 0, 400)
                            @endphp
                        @elseif (app()->getLocale() == 'en')
                            @php
                                echo substr($career->post_en, 0, 400)
                            @endphp
                        @elseif (app()->getLocale() == 'kh')
                            @php
                                echo substr($career->post_kh, 0, 400)
                            @endphp
                        @else
                            @php
                                echo substr($career->post_th, 0, 400)
                            @endphp
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="col-md-4">
                    <div class="bg-white">
                        <p class="ms-3 pt-3 fw-bold h5">Popular Article</p>
                        <ul class="list-group list-group-flush">
                            @foreach ( $careers_last as $last )
                            <li class="list-group-item">
                                <a href="/career/{{ $last->id }}" class="text-dark text-decoration-none">
                                    @if (app()->getLocale() == 'ch')
                                        {{ $last->title_ch }}   
                                    @elseif (app()->getLocale() == 'en')
                                        {{ $last->title_en }}   
                                    @elseif (app()->getLocale() == 'kh')
                                        {{ $last->title_kh }}   
                                    @else
                                        {{ $last->title_th }}   
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    

@endsection